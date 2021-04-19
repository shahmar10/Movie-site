const searchWrapper = document.querySelector(".header__search-content");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".sugcavab");

//istifadeci duymeye basanda
inputBox.onkeyup = (e)=>{
    console.log(e.target.value);
}
