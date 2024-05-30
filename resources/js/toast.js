export function toastNotification() {
    return {
        open: false,
        title: "Success!",
        message: "We hebben je bericht ontvangen. We nemen zo snel mogelijk contact met je op.",
        success: true,
        openToast() {
            this.open = true
            setTimeout(() => {
                this.open = false
            }, 5000)
        }
    }
}
