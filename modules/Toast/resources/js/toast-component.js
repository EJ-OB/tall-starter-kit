import { Toast } from "./Toast.js";

window.Toast = Toast;

export default (Alpine) => {
    Alpine.data('toastComponent', ({ toast }) => ({
        isShown: false,

        computedStyle: null,

        transitionDuration: null,

        transitionEasing: null,

        init: function () {
            this.computedStyle = window.getComputedStyle(this.$el)

            this.transitionDuration =
                parseFloat(this.computedStyle.transitionDuration) * 1000

            this.transitionEasing = this.computedStyle.transitionTimingFunction

            this.configureTransitions()
            this.configureAnimations()

            if (toast.duration && toast.duration !== 'persistent') {
                setTimeout(() => {
                    if (!this.$el.matches(':hover')) {
                        this.close()

                        return
                    }

                    this.$el.addEventListener('mouseleave', () => this.close())
                }, toast.duration)
            }

            this.isShown = true
        },

        configureTransitions: function () {
            const display = this.computedStyle.display

            const show = () => {
                Alpine.mutateDom(() => {
                    this.$el.style.setProperty('display', display)
                    this.$el.style.setProperty('visibility', 'visible')
                })
                this.$el._x_isShown = true
            }

            const hide = () => {
                Alpine.mutateDom(() => {
                    this.$el._x_isShown
                        ? this.$el.style.setProperty('visibility', 'hidden')
                        : this.$el.style.setProperty('display', 'none')
                })
            }

            const toggle = this.once(
                (value) => (value ? show() : hide()),
                (value) => {
                    this.$el._x_toggleAndCascadeWithTransitions(
                        this.$el,
                        value,
                        show,
                        hide,
                    )
                },
            )

            Alpine.effect(() => toggle(this.isShown))
        },

        configureAnimations: function () {
            let animation

            Livewire.hook('commit', ({ component, succeed, respond }) => {
                if (!component.snapshot.data.isToastComponent) {
                    return
                }

                // Calling `el.getBoundingClientRect()` from outside `requestAnimationFrame()` can
                // occasionally cause the page to scroll to the top.
                requestAnimationFrame(() => {
                    const getTop = () => this.$el.getBoundingClientRect().top
                    const oldTop = getTop()

                    respond(() => {
                        animation = () => {
                            if (!this.isShown) {
                                return
                            }

                            this.$el.animate(
                                [
                                    { transform: `translateY(${oldTop - getTop()}px)` },
                                    { transform: 'translateY(0px)' },
                                ],
                                {
                                    duration: this.transitionDuration,
                                    easing: this.transitionEasing,
                                },
                            )
                        }

                        this.$el
                            .getAnimations()
                            .forEach((animation) => animation.finish())
                    })

                    succeed(() => { animation() })
                })
            })
        },

        close: function () {
            this.isShown = false

            setTimeout(() => window.dispatchEvent(
                new CustomEvent('toast:closed', {
                    detail: {
                        id: toast.id,
                    },
                }),
            ), this.transitionDuration)
        },

        once(callback, fallback2 = () => {}) {
            let called = false;

            return function() {
                if (!called) {
                    called = true;
                    callback.apply(this, arguments);
                } else {
                    fallback2.apply(this, arguments);
                }
            };
        }
    }))
}
