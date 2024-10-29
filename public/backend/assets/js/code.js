$(function () {
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "Delete This Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });
});


$(function () {
    $(document).on("click", "#confirm", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "Confirm This Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Confirm!", "Your file has been Confirmed.", "success");
            }
        });
    });
});

$(function () {
    $(document).on("click", "#processing", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "Processing This Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Processing it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Processing!", "Your file has been Processing.", "success");
            }
        });
    });
});
//deliverd

$(function () {
    $(document).on("click", "#deliverd", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "Deliverd This Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Deliverd it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deliverd!", "Your file has been Deliverd.", "success");
            }
        });
    });
});

//reject
$(function () {
    $(document).on("click", "#reject", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "Reject This Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Reject it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Reject!", "Your file has been Reject.", "success");
            }
        });
    });
});
        