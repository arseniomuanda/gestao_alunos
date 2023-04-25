// $("#overdue").hide();
// $("#bomdia").show();
var vue_header = new Vue({
    el: '#header',
    data() {
        return {
            email: sessionStorage.email,
            token: sessionStorage.token,
            firma: sessionStorage.firma,
            nome: sessionStorage.nome,
            id: sessionStorage.id,
            notification: []
        }
    },
    methods:{
    },
    mounted() {
        // this.getDashboard()
    },
    destroyed() {
        setTimeout(() => {
            vue_det.logout();
        }, 5000);
    },
});


var vue_app = new Vue({
    el: '#app',
    data() {
        return {
        }
    },
    methods:{
        addFuncionario: async function(){
            //return alert(1);
            const form = new FormData();
            form.append("email", document.getElementById('email').value);
            form.append("bairro", document.getElementById('bairro').value);
            form.append("rua", document.getElementById('rua').value);
            form.append("municipio", document.getElementById('municipio').value);
            form.append("n_casa", document.getElementById('n_casa').value);
            form.append("telefone", document.getElementById('telefone').value);
            form.append("bi", document.getElementById('bi').value);
            form.append("sexo", document.getElementById('sexo').value);
            form.append("nome", document.getElementById('nome').value);
            form.append("numero", document.getElementById('numero').value);
            form.append("categoria", document.getElementById('categoria').value);

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}` 
                }
            };

            options.body = form;

            fetch('/api/funcionario/new', options)
                .then(response => response.json())
                .then(response =>{
                    if(response.code == 200){
                        location = '/rh/funcionarios/' + response.id;
                    }
                    console.log(response);
                })
                .catch(err => console.error(err));
        },
        editFuncionario: async function(id){
            //return alert(1);

            let foto = document.getElementById('foto');
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value);
            form.append('numero', document.getElementById('numero').value);
            form.append('bi', document.getElementById('bi').value);
            form.append('sexo', document.getElementById('sexo').value);
            form.append('about', document.getElementById('about').value);
            form.append('email', document.getElementById('email').value);
            form.append('telefone', document.getElementById('telefone').value);
            form.append('municipio', document.getElementById('municipio').value);
            form.append('bairro', document.getElementById('bairro').value);
            form.append('rua', document.getElementById('rua').value);
            form.append('n_casa', document.getElementById('n_casa').value);
            form.append('foto', foto.files[0]);

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}` 
                }
            };

            options.body = form;

            fetch(`/api/funcionario/update/${id}`, options)
                .then(response => response.json())
                .then(response =>{
                    if(response.code == 200){
                        location.reload();
                    }
                    console.log(response);
                })
                .catch(err => console.error(err));
        },
        editPass: async function (id) {
            //return alert(1);
            const form = new FormData();

            let currentPassword = document.getElementById('currentPassword').value;
            let newpassword = document.getElementById('newpassword').value;
            let renewpassword = document.getElementById('renewpassword').value;

            if(newpassword != renewpassword){
                return alert('Password não combina!');
            }

            form.append('oldpass', currentPassword);
            form.append('newpass', newpassword);

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            options.body = form;

            fetch(`/api/funcionario/newpassword/${id}`, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                    }
                    console.log(response);
                })
                .catch(err => console.error(err));
        },
        resetPass: async function (id) {
            //return alert(1);
            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            fetch(`/api/funcionario/resetpassword/${id}`, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                    }
                    console.log(response);
                })
                .catch(err => console.error(err));
        }
    },
    mounted() {
    },
    destroyed() {
        setTimeout(() => {
            vue_det.logout();
        }, 5000);
    },
});