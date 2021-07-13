let theme_dot = document.getElementsByClassName("icm");

let theme = localStorage.getItem('theme');
if (theme === null){
    setTheme("white");
} else {
    setTheme(theme);
}

for (let i = 0; i <= theme_dot.length; i++){
    theme_dot[i].addEventListener('click', function (){
        let mode = this.dataset.mode;
        setTheme(mode);
        alert("Theme set to " + mode + " mode");
    })
}

function setTheme(mode){
    if (mode === 'white'){
        document.getElementById("theme-css").href = "light.css";
    } else if (mode === 'black') {
        document.getElementById("theme-css").href = "dark.css";
    }
    localStorage.setItem("theme", mode);
}

