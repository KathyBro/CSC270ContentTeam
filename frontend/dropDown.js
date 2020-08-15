$(".Drop_Down_Button").on("click", (event) => {
    let buttonId = event.target.id;
    if($("#" + buttonId).text() === "▼") {
        $("#" + buttonId).text("▲");
        let menu = $("#" + buttonId + " + .Drop_Down_Menu");
        menu.removeClass("Drop_Down_Menu_Show");
    } else {
        $("#" + buttonId).text("▼");
        let menu = $("#" + buttonId + " + .Drop_Down_Menu");
        menu.addClass("Drop_Down_Menu_Show");
    }
});