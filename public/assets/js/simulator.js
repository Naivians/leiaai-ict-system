$("#sim_form").on("submit", function (e) {
    e.preventDefault();
    const issue_text = quill.root.innerHTML;
    const isEmpty = quill.getLength() <= 1;
    const form = this;
    const formData = new FormData(form);

    formData.append("issue_text", issue_text);

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

            if(!res.success){
                error_message(res.message)
            }

            success_message(res.message)

            setTimeout(() => {
                window.location.reload()
            }, 1500)
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
