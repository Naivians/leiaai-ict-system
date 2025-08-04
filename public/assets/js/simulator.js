$("#sim_form").on("submit", function (e) {
    e.preventDefault();
    const issue_text = quill.root.innerHTML;
    const isEmpty = quill.getLength() <= 1;
    const form = this;
    const formData = new FormData(form);

    formData.append("issue_text", issue_text);

    $(form).find("button[type='submit']").prop("disabled", true);

    if (isEmpty) {
        error_message("Input fields cannot be empty");
        return;
    }

    $.ajax({
        url: "/simulator/form",
        method: "POST",
        processData: false,
        contentType: false,
        data: formData,
        beforeSend: () => {
            pre_loader();
        },
        success: (res) => {
            if (!res.success) {
                error_message(res.message);
            }

            success_message(res.message);
            setTimeout(() => {
                $(form).find("button[type='submit']").prop("disabled", false);
                window.location.reload();
            }, 1500);
        },
    });
});
$("#update_sim_form").on("submit", function (e) {
    e.preventDefault();
    const solution_text = quill.root.innerHTML;
    const isEmpty = quill.getLength() <= 1;
    const form = this;
    const formData = new FormData(form);

    formData.append("solution_text", solution_text);

    // for (const [key, value] of formData.entries()) {
    //     console.log(`${key}: ${value}`);
    // }

    // return;

    if (isEmpty) {
        error_message("Input fields cannot be empty");
        return;
    }

    $(form).find("button[type='submit']").prop("disabled", true);

    $.ajax({
        url: "/simulator/form/update",
        method: "POST",
        processData: false,
        contentType: false,
        data: formData,
        beforeSend: () => {
            pre_loader();
        },
        success: (res) => {
            if (!res.success) {
                error_message(res.message);
            }

            success_message(res.message);
            setTimeout(() => {
                $(form).find("button[type='submit']").prop("disabled", false);
                window.location.href = "/simulator";
            }, 1500);
        },
    });
});

function render_sim_report() {
    // $.ajax({
    //     url: "/simulator/home",
    //     method: "GET",
    //     success: (res) => {
    //         console.log(res);
    //     },
    // });
    // $.ajax({
    //     url: "/simulator/home",
    //     method: "GET",
    //     success: (res) => {
    //         // if (res.success) {
    //         //     $("#sim_container").empty().append(res.data); // this is OK
    //         // } else {
    //         //     $("#sim_container").html(
    //         //         '<p class="text-danger">Failed to load simulation data.</p>'
    //         //     );
    //         // }
    //         console.log(res.data);
    //     },
    //     error: () => {
    //         $("#sim_container").html(
    //             '<p class="text-danger">Error loading data from server.</p>'
    //         );
    //     },
    // });
}
