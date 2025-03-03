export default (Alpine) => {
    Alpine.magic('toast', () => {
        return (messageOrOptions) => {
            let toast = new Toast();

            if (typeof messageOrOptions === 'string') {
                toast.message(messageOrOptions).send();
            } else if (typeof messageOrOptions === 'object') {
                const {
                    title,
                    message,
                    variant,
                    icon,
                    duration
                } = messageOrOptions

                toast
                    .title(title || null)
                    .message(message || null)
                    .variant(variant || null)
                    .icon(icon || null)
                    .duration(duration || null)
                    .send()
            }

            return toast;
        }
    });
}
