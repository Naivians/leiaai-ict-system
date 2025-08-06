
$("#forms").on("show.bs.collapse", function () {
    $("#forms-caret").addClass("rotate-180");
});
$("#forms").on("hide.bs.collapse", function () {
    $("#forms-caret").removeClass("rotate-180");
});

$(window).on("resize", () => {
    checkScreenSize();
});
// sidebar config
let menu = $(".menu");
let closeBtn = $("#closeBtn");
let iconArray = $(".menu-icon");
let menu_item = $(".menu-item");
let textArray = $(".menu-text");
let logo_container = $(".logo-container");
let main = $(".main");
let navbar = $(".fixed-top");
let caret = $(".forms-caret");
let submenu = $(".submenu");

menu_item.on("click", function () {
    $(this).find(".forms-caret").toggleClass("rotate-180");
});

closeBtn.on("click", () => {
    collapseSidebar();
    $(".back-btn").toggleClass("rotate-sidebar-btn");
});

iconArray.each(function (index, icon) {
    $(icon).on("click", function () {
        collapseSidebar();
    });
});

function collapseSidebar() {
    iconArray.each(function (index, icon) {
        $(icon).toggleClass("menu-icons-big");
    });

    submenu.toggleClass("d-none");

    menu.toggleClass("menu-collapse");
    navbar.toggleClass("collapse-nav");

    main.each(function (index, mains) {
        $(mains).toggleClass("main-collapse");
    });

    textArray.each(function (index, text) {
        $(text).toggleClass("menu-text-collapse");
    });

    logo_container.toggleClass("logo-collapse");
}
// end sidebar config

const radios = document.querySelectorAll('input[name="options"]');

radios.forEach((radio) => {
    radio.addEventListener("change", () => {
        localStorage.setItem("timeAction", radio.value);
        localStorage.getItem("timeAction") === "in"
            ? localStorage.setItem("timeAction", "in")
            : localStorage.setItem("timeAction", "out");

        radio.value = localStorage.getItem("timeAction");
    });
});

function getSim(assignSim) {
    localStorage.setItem("assignSim", assignSim);
    alert(localStorage.getItem("assignSim"));
}

function saveTime() {
    let timeAction = localStorage.getItem("timeAction");
    let assignSim = localStorage.getItem("assignSim");

    if (timeAction == null && assignSim == null) {
        error_message(
            "Time in, Time out button and Sim Assignment are required!"
        );
        return;
    }

    if (timeAction == null) {
        error_message("Time in or Time out button is required!");
        return;
    }

    if (assignSim == null) {
        error_message("Sim Assignment is required!");
        return;
    }
}
