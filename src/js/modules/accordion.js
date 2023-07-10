export default function accordion() {

    let acc = document.querySelectorAll(".section-accordion__accordion");

    if (!acc) return;

    acc.forEach(el => {
        el.addEventListener('click', function () {
            this.classList.toggle("active");
            let panel = this.nextElementSibling;
            panel.classList.toggle("active");
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + 40 + "px";
            }
        })
    })
}