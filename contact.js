document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(form);

        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
        });

        const result = await response.json(); // Parse JSON response
        if (result.status === 'success') {
            Swal.fire({
                title: "Success",
                text: result.message,
                icon: "success",
            }).then(() => {
                form.reset(); // Reset the form
            });
        } else {
            Swal.fire({
                title: "Oops!",
                text: result.message,
                icon: "error",
            });
        }
    });
});
