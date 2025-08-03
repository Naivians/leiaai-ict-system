function error_message(msg = "") {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: msg,
    });
}

function success_message(msg = "") {
    Swal.fire({
        position: "top-center",
        icon: "success",
        title: msg,
        showConfirmButton: false,
        timer: 1500,
    });
}

function deleteMessage(msg = "", callbacks) {
    Swal.fire({
        title: "Are you sure?",
        text: msg,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            callbacks();
        }
    });
}

function pre_loader(msg = "Redi") {
    Swal.fire({
        title: "Loading...",
        html: `
    <div class="d-flex justify-content-center">
      <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="mt-3">Please wait</div>
  `,
        allowOutsideClick: false,
        showConfirmButton: false,
    });
}
