// $("#overdue").hide();
// $("#bomdia").show();
var vue_header = new Vue({
    el: '#header',
    data() {
        return {
            email: sessionStorage.email,
            token: sessionStorage.token,
            acesso: sessionStorage.acesso,
            nome: sessionStorage.nome,
            foto: sessionStorage.foto,
            id: sessionStorage.id,
            aluno: sessionStorage.aluno,
            notification: []
        }
    },
    methods: {
        logout: async function () {
            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            fetch(`/api/logout`, options)
                .then(response => response.json())
                .then(response => {
                    sessionStorage.clear()
                    location.reload();
                })
                .catch(err => console.error(err));
        }
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

var vue_sider = new Vue({
    el: '#sidebar',
    data() {
        return {
            email: sessionStorage.email,
            token: sessionStorage.token,
            acesso: sessionStorage.acesso,
            nome: sessionStorage.nome,
            foto: sessionStorage.foto,
            id: sessionStorage.id,
            aluno: sessionStorage.aluno,
            notification: []
        }
    },
    methods: {
        logout: async function () {
            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            fetch(`/api/logout`, options)
                .then(response => response.json())
                .then(response => {
                    sessionStorage.clear()
                    location.reload();
                })
                .catch(err => console.error(err));
        }
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
    el: '#main',
    data() {
        return {
            acesso: sessionStorage.acesso,
            id: sessionStorage.id,
            aluno: sessionStorage.aluno,
            turmas: [],
            disciplinas: []
        }
    },
    methods: {
        message: function (response) {
            switch (key.code) {
                case 400:
                    alert(key.message);
                    break;
                default:
                    break;
            }
            return;
        },
        addFuncionario: async function () {
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
                .then(response => {
                    if (response.code == 200) {
                        location = '/rh/funcionarios/' + response.id;
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        addCurso: async function () {
            //return alert(1);
            const form = new FormData();
            form.append("nome", document.getElementById('nome').value);
            form.append("sigla", document.getElementById('sigla').value);
            form.append("limite_alunos", document.getElementById('limite_alunos').value);

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            options.body = form;

            fetch('/api/cursos/new', options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location = '/escolar/cursos/' + response.id;
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        addDisciplina: async function () {
            const form = new FormData();
            form.append("nome", document.getElementById('nome').value);
            form.append("ano", document.getElementById('ano').value);
            form.append("curso", document.getElementById('curso').value);

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            options.body = form;

            fetch('/api/disciplinas/new', options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location = '/escolar/disciplinas/' + response.id;
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        addAluno: async function () {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)
            form.append('bi', document.getElementById('bi').value)
            form.append('telefone', document.getElementById('telefone').value)
            form.append('email', document.getElementById('email').value)
            form.append('datanascimento', document.getElementById('datanascimento').value)
            form.append('sexo', document.getElementById('sexo').value)
            form.append('municipio', document.getElementById('municipio').value)
            form.append('bairro', document.getElementById('bairro').value)
            form.append('rua', document.getElementById('rua').value)
            form.append('n_casa', document.getElementById('n_casa').value)
            form.append('nome_pai', document.getElementById('nome_pai').value)
            form.append('nome_mae', document.getElementById('nome_mae').value)
            form.append('nome_encarregado', document.getElementById('nome_encarregado').value)
            form.append('telefone_encarregado', document.getElementById('telefone_encarregado').value)
            form.append('curso', document.getElementById('curso').value)
            form.append('turma', document.getElementById('turma').value)
            form.append('dataentrada', document.getElementById('dataentrada').value)
            form.append('certificado', document.getElementById('certificado').files[0])
            form.append('foto_tipo_pass', document.getElementById('foto_tipo_pass').files[0])
            form.append('atestado_medico', document.getElementById('atestado_medico').files[0])
            form.append('declaracao_notas', document.getElementById('declaracao_notas').files[0])
            form.append('copia_bi', document.getElementById('copia_bi').files[0])

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/alunos/new', options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location = '/escolar/alunos/' + response.data[0].id;
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        addProva: async function () {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)
            form.append('ano', document.getElementById('ano').value)
            form.append('curso', document.getElementById('curso').value)
            form.append('disciplina', document.getElementById('disciplina').value)
            form.append('trimestre', document.getElementById('trimestre').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/provas/new', options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location = '/escolar/provas/' + response.data[0].id;
                        console.log(response);
                    }
                    console.log(response);
                })
                .catch(err => console.error(err));
        },
        addVaga: async function () {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)
            form.append('maximo_candidados', document.getElementById('maximo_candidados').value)
            form.append('inicio', document.getElementById('inicio').value)
            form.append('fim', document.getElementById('fim').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/vagas/new', options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location = '/candidaturas/vagas/' + response.data[0].id;
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        addSala: async function () {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/salas/new', options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location = '/config/salas/' + response.data[0].id;
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        addTurma: async function () {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)
            form.append('sala', document.getElementById('sala').value)
            form.append('curso', document.getElementById('curso').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/turmas/new', options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location = '/config/turmas/' + response.data[0].id;
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editFuncionario: async function (id) {
            //return alert(1);

            let foto = document.getElementById('foto_pass');
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
                .then(response => {
                    if (response.code == 200) {
                        console.log(response);
                        location.reload();
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editCurso: async function (id) {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value);
            form.append('sigla', document.getElementById('sigla').value);
            form.append('limite_alunos', document.getElementById('limite_alunos').value);

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            options.body = form;

            fetch(`/api/cursos/update/${id}`, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        console.log(response);
                        location.reload();
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editDisciplina: async function (id) {
            const form = new FormData();
            form.append("nome", document.getElementById('nome').value);
            form.append("ano", document.getElementById('ano').value);
            form.append("curso", document.getElementById('curso').value);

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            options.body = form;

            fetch(`/api/disciplinas/update/${id}`, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        console.log(response);
                        location.reload();
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editAluno: async function (id) {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)
            form.append('numero', document.getElementById('numero').value)
            form.append('bi', document.getElementById('bi').value)
            form.append('sexo', document.getElementById('sexo').value)
            form.append('email', document.getElementById('email').value)
            form.append('telefone', document.getElementById('telefone').value)
            form.append('dataentrada', document.getElementById('dataentrada').value)
            form.append('datanascimento', document.getElementById('datanascimento').value)
            form.append('nome_pai', document.getElementById('nome_pai').value)
            form.append('nome_mae', document.getElementById('nome_mae').value)
            form.append('nome_encarregado', document.getElementById('nome_encarregado').value)
            form.append('telefone_encarregado', document.getElementById('telefone_encarregado').value)
            form.append('municipio', document.getElementById('municipio').value)
            form.append('bairro', document.getElementById('bairro').value)
            form.append('rua', document.getElementById('rua').value)
            form.append('n_casa', document.getElementById('n_casa').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/alunos/update/' + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editProva: async function () {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)
            form.append('ano', document.getElementById('ano').value)
            form.append('curso', document.getElementById('curso').value)
            form.append('disciplina', document.getElementById('disciplina').value)
            form.append('trimestre', document.getElementById('trimestre').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/provas/update/' + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editSala: async function (id) {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/salas/update/' + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        //location.reload();
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editVaga: async function (id) {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)
            form.append('maximo_candidados', document.getElementById('maximo_candidados').value)
            form.append('inicio', document.getElementById('inicio').value)
            form.append('fim', document.getElementById('fim').value)
            form.append('estado', document.getElementById('estado').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/vagas/update/' + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editTurma: async function (id) {
            const form = new FormData();
            form.append('nome', document.getElementById('nome').value)
            form.append('sala', document.getElementById('sala').value)
            form.append('curso', document.getElementById('curso').value)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/turmas/update/' + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        editCadidato: async function (id) {
            let formData = document.getElementById('update_candidato');
            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                },
                body: new FormData(formData)
            };

            fetch('http://localhost:8080/api/candidatos/update/' + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        updateDocumentos: async function (id, isAluno = true) {
            const form = new FormData();
            form.append('certificado', document.getElementById('certificado').files[0])
            form.append('foto_tipo_pass', document.getElementById('foto_tipo_pass').files[0])
            form.append('atestado_medico', document.getElementById('atestado_medico').files[0])
            form.append('declaracao_notas', document.getElementById('declaracao_notas').files[0])
            form.append('copia_bi', document.getElementById('copia_bi').files[0])

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };
            let url;
            if (isAluno) {
                url = '/api/alunos/updateImagens/';
            } else {
                url = '/api/candidatos/updateImagens/';
            }

            fetch(url + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        removeFuncionario: async function (id) {

            let op = confirm('Delesa eliminar este utilizador?');

            if (op) {
                const options = {
                    method: 'POST',
                    headers: {
                        Authorization: `Bearer ${sessionStorage.token}`
                    }
                };

                fetch(`/api/funcionario/remove/${id}`, options)
                    .then(response => response.json())
                    .then(response => {
                        if (response.code == 200) {
                            location.reload();
                        } else {
                            alert(response.message);
                            console.log(response);
                        }
                    })
                    .catch(err => console.error(err));
            } else {
                return false;
            }

        },
        removeCurso: async function (id) {

            let op = confirm('Delesa eliminar este curso?');

            if (op) {
                const options = {
                    method: 'POST',
                    headers: {
                        Authorization: `Bearer ${sessionStorage.token}`
                    }
                };

                fetch(`/api/cursos/remove/${id}`, options)
                    .then(response => response.json())
                    .then(response => {
                        if (response.code == 200) {
                            location.reload();
                        } else {
                            alert(response.message);
                            console.log(response);
                        }
                    })
                    .catch(err => console.error(err));
            } else {
                return false;
            }

        },
        removeDisciplica: async function (id) {

            let op = confirm('Delesa eliminar esta disciplina?');

            if (op) {
                const options = {
                    method: 'POST',
                    headers: {
                        Authorization: `Bearer ${sessionStorage.token}`
                    }
                };

                fetch(`/api/disciplinas/remove/${id}`, options)
                    .then(response => response.json())
                    .then(response => {
                        if (response.code == 200) {
                            location.reload();
                        } else {
                            alert(response.message);
                            console.log(response);
                        }
                    })
                    .catch(err => console.error(err));
            } else {
                return false;
            }

        },
        removeProva: async function (id) {

            let op = confirm('Delesa eliminar esta prova?');

            if (op) {
                const options = {
                    method: 'POST',
                    headers: {
                        Authorization: `Bearer ${sessionStorage.token}`
                    }
                };

                fetch(`/api/provas/remove/${id}`, options)
                    .then(response => response.json())
                    .then(response => {
                        if (response.code == 200) {
                            location.reload();
                        } else {
                            alert(response.message);
                            console.log(response);
                        }
                    })
                    .catch(err => console.error(err));
            } else {
                return false;
            }

        },
        removeVaga: async function (id) {

            let op = confirm('Delesa eliminar esta vaga?');

            if (op) {
                const options = {
                    method: 'POST',
                    headers: {
                        Authorization: `Bearer ${sessionStorage.token}`
                    }
                };

                fetch(`/api/vagas/remove/${id}`, options)
                    .then(response => response.json())
                    .then(response => {
                        if (response.code == 200) {
                            location.reload();
                        } else {
                            alert(response.message);
                            console.log(response);
                        }
                    })
                    .catch(err => console.error(err));
            } else {
                return false;
            }

        },
        removeSala: async function (id) {

            let op = confirm('Delesa eliminar esta sala?');

            if (op) {
                const options = {
                    method: 'POST',
                    headers: {
                        Authorization: `Bearer ${sessionStorage.token}`
                    }
                };

                fetch(`/api/salas/remove/${id}`, options)
                    .then(response => response.json())
                    .then(response => {
                        if (response.code == 200) {
                            location.reload();
                        } else {
                            alert(response.message);
                            console.log(response);
                        }
                    })
                    .catch(err => console.error(err));
            } else {
                return false;
            }

        },
        removeTurma: async function (id) {
            let op = confirm('Delesa eliminar esta turma?');

            if (op) {
                const options = {
                    method: 'POST',
                    headers: {
                        Authorization: `Bearer ${sessionStorage.token}`
                    }
                };

                fetch(`/api/turmas/remove/${id}`, options)
                    .then(response => response.json())
                    .then(response => {
                        if (response.code == 200) {
                            location.reload();
                        } else {
                            alert(response.message);
                            console.log(response);
                        }
                    })
                    .catch(err => console.error(err));
            } else {
                return false;
            }

        },
        removeListaCandidatos: async function (id) {
            let op = confirm('Delesa eliminar esta lista?');

            if (op) {
                const options = {
                    method: 'POST',
                    headers: {
                        Authorization: `Bearer ${sessionStorage.token}`
                    }
                };

                fetch(`/api/vagas/removeAll/${id}`, options)
                    .then(response => response.json())
                    .then(response => {
                        if (response) {
                            location.reload();
                        }
                    })
                    .catch(err => console.error(err));
            } else {
                return false;
            }

        },
        editPass: async function (id) {
            //return alert(id);
            const form = new FormData();

            let currentPassword = document.getElementById('currentPassword').value;
            let newpassword = document.getElementById('newpassword').value;
            let renewpassword = document.getElementById('renewpassword').value;

            if (newpassword != renewpassword) {
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
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err.message));
        },

        updateEstado: async function (id, estado) {

            let confirmation = confirm(`Vecê deseja ${estado == 1 ? 'aprovar' : 'reprovar'} este candidato?`);
            if (!confirmation) {
                return false;
            }

            const form = new FormData();
            form.append('estado', estado)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch('/api/candidatos/update_estado/' + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                        console.log(response);
                    }
                    else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },

        matricularCandidato: async function (id) {

            let confirmation = confirm("Vecê deseja Matricular esté este candidato?");
            if (!confirmation) {
                return false;
            }

            let form = document.getElementById('matrucularForm')
            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: new FormData(form)
            };

            fetch('/api/candidatos/matricuar/' + id, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                        console.log(response);
                    }
                    else {
                        alert(response.message);
                        console.log(response);
                    }
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
                    else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },

        setNota: async function (numero, aluno, prova, value, id) {

            let confirmation = confirm('Deseja alterar a nota do Aluno nº ' + numero);
            if (!confirmation) {
                return;
            }

            let form = new FormData();
            let maxValue = 20;
            if (value > maxValue) {
                return alert("O valor maximo é de " + maxValue);
            }

            if (id == 'undefined') {
                id = null;
            }

            if (typeof id == 'undefined') {
                id = null;
            }

            form.append('aluno', aluno)
            form.append('prova', prova)
            form.append('value', value)
            form.append('id', id)

            const options = {
                method: 'POST',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }, body: form
            };

            fetch(`/api/provas/setnota`, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code == 200) {
                        location.reload();
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                })
                .catch(err => console.error(err));
        },
        buscarCursos: async function (id) {
            const options = {
                method: 'GET',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            fetch(`/api/turmas/curso/${id}`, options)
                .then(response => response.json())
                .then(response => {
                    if (response.code != 200) {
                        alert(response.message);
                        console.log(response);
                        return;
                    }
                    this.turmas = response.data;
                    console.log(response);

                })
                .catch(err => console.error(err));
        },
        buscarDisciplica: async function (id) {
            if(id == ''){
                return false;
            }
            const options = {
                method: 'GET',
                headers: {
                    Authorization: `Bearer ${sessionStorage.token}`
                }
            };

            fetch(`/api/cursos/disciplina/${id}`, options)
                .then(response => response.json())
                .then(response => {
                    this.disciplinas = response.data;
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