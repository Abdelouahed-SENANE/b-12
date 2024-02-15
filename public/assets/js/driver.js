const driverTabs = document.querySelectorAll(".linktab");
const contents = document.querySelectorAll(".content");
console.log(contents);
driverTabs.forEach((tab, index) => {
    tab.addEventListener("click", () => {
        driverTabs.forEach((tab) => {
            tab.classList.remove("active");
        });
        tab.classList.add("active");
        contents.forEach((content) => {
            content.classList.remove("active");
        });
        contents[index].classList.add("active");
    });
});

$(document).ready(function () {


    function statusUpdated(status) {
        const endpoint = "/driver/status";
        $.ajax({
            url: endpoint,
            method: "GET",
            data: {
                status: status,
            },
            success: function (response) {
                if (response.success) {
                    if (response.available == 1) {
                        $("#status").addClass("bg-green-500");
                        $("#status").removeClass("bg-red-500");
                    } else {
                        $("#status").removeClass("bg-green-500");
                        $("#status").addClass("bg-red-500");
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error("Status update error:", error);
            },
        });
    }

    $("#checkStatus").change(function () {
        var isChecked = $(this).is(":checked");
        statusUpdated(isChecked ? 1 : 0);
    });
});
// ========== Show Form ==========
const btn_route = document.getElementById("btn_route");
const container_form = document.getElementById("container_form");
console.log(container_form);

btn_route.addEventListener("click", () => {
    if (container_form.classList.contains("opacity-0")) {
        container_form.classList.remove("opacity-0", "invisible");
    } else {
        container_form.classList.add("opacity-0", "invisible");
    }
});

function closeForm() {
    container_form.classList.add("opacity-0", "invisible");
}
function showForm() {
    container_form.classList.remove("opacity-0", "invisible");
}
