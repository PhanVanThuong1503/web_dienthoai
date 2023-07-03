const leftbtn = document.querySelector('.fa-chevron-left')
const rightbtn = document.querySelector('.fa-chevron-right')
const imgnumber = document.querySelectorAll('.product_list1')
let index = 0

rightbtn.addEventListener("click", function() {
    index = index + 1
    if (index > imgnumber.length - 1) {
        index = 0
    }
    document.querySelector(".abc").style.right = index *100+"%"
})

leftbtn.addEventListener("click", function() {
    index = index - 1
    if (index < 0) {
        index = imgnumber.length - 1;
    }
    document.querySelector(".abc").style.right = index *100+"%"
})