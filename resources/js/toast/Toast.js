import { v4 as uuid } from 'uuid-browser'

export class Toast {
    constructor() {
        this.id(uuid())

        return this
    }

    id(id) {
        this.id = id

        return this
    }

    title(title) {
        this.title = title

        return this
    }

    message(message) {
        this.message = message

        return this
    }

    variant(variant) {
        this.variant = variant

        return this
    }

    color(color) {
        this.color = color

        return this
    }

    icon(icon) {
        this.icon = icon

        return this
    }

    iconColor(color) {
        this.iconColor = color

        return this
    }

    duration(duration) {
        this.duration = duration

        return this
    }

    seconds(seconds) {
        this.duration(seconds * 1000)

        return this
    }

    persistent() {
        this.duration('persistent')

        return this
    }

    danger() {
        this.variant('danger')

        return this
    }

    info() {
        this.variant('info')

        return this
    }

    success() {
        this.variant('success')

        return this
    }

    warning() {
        this.variant('warning')

        return this
    }

    send() {
        window.dispatchEvent(
            new CustomEvent('toast:js-sent', {
                detail: {
                    toast: this,
                },
            }),
        )

        return this
    }
}
