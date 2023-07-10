export default function faq() {

    // let acc = document.getElementsByClassName("section-faq__accordion");
    // let i;

    // if (acc) {
    //     for (i = 0; i < acc.length; i++) {
    //         acc[i].addEventListener("click", function () {
    //             this.classList.toggle("active");
    //             var panel = this.nextElementSibling;
    //             if (panel.style.maxHeight) {
    //                 panel.style.maxHeight = null;
    //             } else {
    //                 panel.style.maxHeight = panel.scrollHeight + "px";
    //             }
    //         });
    //     }
    // }

    let acc = document.querySelectorAll(".section-faq__accordion");

    if (!acc) return;

    acc.forEach(el => {
        el.addEventListener('click', function () {
            this.classList.toggle("active");
            let panel = this.nextElementSibling;
            panel.classList.toggle("active");
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + 20 + "px";
            }
        })
    })

}