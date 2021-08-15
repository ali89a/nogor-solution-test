require("./bootstrap");

import Form from "vform";

window.Form = Form;

// ES6 Modules or TypeScript
import toastr from "toastr";
window.toastr = toastr;
import Swal from "sweetalert2";
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});
window.Toast = Toast;

window.Vue = require("vue").default;
Vue.component("home", require("./components/frontend/Home.vue").default);

const app = new Vue({
    el: "#app"
});
