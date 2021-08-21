const usertitle = document.getElementById("usertitle");
const dosentitle = document.getElementById("dosentitle");

const accounts = document.getElementsByClassName("accounts");

usertitle.addEventListener("click", showTab1);
function showTab1() {
    const tabletitle = document.getElementById("tabletitle");
    tabletitle.innerHTML = '<i class="fas fa-table me-1"></i> Mahasiswa Accounts Control';
    for (let i = 0; i < accounts.length; i++) {
        accounts[i].classList.add("visually-hidden");
    }
    const users = document.getElementsByClassName("users");
    for (let i = 0; i < users.length; i++) {
        users[i].classList.remove("visually-hidden");
    }
}

dosentitle.addEventListener("click", showTab2);
function showTab2() {
    const tabletitle = document.getElementById("tabletitle");
    tabletitle.innerHTML = '<i class="fas fa-table me-1"></i> Dosen Accounts Control';
    for (let i = 0; i < accounts.length; i++) {
        accounts[i].classList.add("visually-hidden");
    }
    const dosens = document.getElementsByClassName("dosens");
    for (let i = 0; i < dosens.length; i++) {
        dosens[i].classList.remove("visually-hidden");
    }
}