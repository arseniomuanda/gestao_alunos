var vue_det = new Vue({
    el: '#app',
    data() {
        return {}
    },
    methods: {
        login: function () {
            let url = api_be + '/login/admin'

            let form = document.querySelector('form');

            axios.post(url, new FormData(form))
                .then(function (response) {
                    // response.data e onde esta o dados tipo
                    /**
                     * {
                     * message
                     * token
                     * email
                     * privilege
                     * status
                     * }
                     */
                    if (response.data) {
                        sessionStorage.clear();
                        localStorage.clear();
                        // this.getUserData()// armazenando token no local storage
                        sessionStorage.setItem("token", response.data.token); // armazenando token no local storage
                        sessionStorage.setItem("email", response.data.email); // armazenando email no local storage
                        sessionStorage.setItem("nome", response.data.name); // armazenando email no local storage
                        sessionStorage.setItem("conta", response.data.conta);
                        sessionStorage.setItem("user", response.data.email); // armazenando email no local storage
                        sessionStorage.setItem("logado", true); // armazenando email no local storage
                        // sessionStorage.setItem("kubikux_user_lock", false); // armazenando email no local storageD
                        sessionStorage.setItem("privilege", response.data.previlege); // armazenando o privi no local storageD
                        // sessionStorage.setItem("overdue_subscricao", false); //
                        location.href = '/'

                    } else {
                        alert("Login incorreto");
                        console.log('resposta', response);
                        // Algo deu errado a reposta nao content nenhuma informacao caso isso acontenca
                        // Da uma olhada oque o servidor esta a responder no console log
                    }
                }).catch(function (error) {
                    // CASO HAJA UM ERRO
                    console.log(error)
                    alert("Nao foi possivel completar o login tente novament")
                });
        },
    },
});