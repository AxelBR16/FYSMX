let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
    let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("showMenu");
    });
}

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-left-arrow");
    let content = document.querySelector(".home-content");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click",()=>{
        sidebar.classList.toggle("close");
        sidebarBtn.classList.toggle("close");
    });


    let star_white = document.querySelectorAll(".bx-star");
    let star_black = document.querySelector(".bxs-star");

    for (var i = 0; i < star_white.length; i++) {
        star_white[i].addEventListener("click", (e)=>{
        let swParent = e.target;
            swParent.classList.toggle("bxs-star");
        });
    }

    /*

    star_white.addEventListener("click",()=>{
        star_white.classList.toggle("bxs-star");
    });

*/