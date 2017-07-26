function Factory() {

    var div = 'div';
    var panel = 'div';
    var input = 'input';


    /* todos os componentes html a serem criados por esta factory,
     previamente declarados como variaveis.*/

    Factory.prototype.Panel = function (w, h, b) {
        var width = (w == '' ? '100%' : w);
        var height = (h == '' ? '100%' : h);
        var border = (b == '' ? 'none' : b);

        var element = document.createElement(div);
        element.style.width = width;
        element.style.height = height;
        element.style.border = border;
        return element;
    };


    Factory.prototype.createComponent = function (objeto) {

        var element = '';
        var elementChild = '';
        var style = '';

        $.each(objeto, function (chave, valor) {

            if (!Array.isArray(valor)) {
                switch (chave) {
                    case "element":
                        element = document.createElement(valor);
                        break;
                    case "width":
                        element.style.width = valor;
                        break;
                    case "height":
                        element.style.height = valor;
                        break;
                    case "border":
                        element.style.border = valor;
                        break;
                    case "innerHTML":
                        $(element).text(valor);
                        break;
                    default:
                        element.setAttribute(chave, valor);
                        break;
                }

            } else {

                if (chave == 'style') {
                    style = objeto.style[0];
                    $.each(style, function (key, value) {
                        $(element).css(key, value);
                        /*Atribuição de estilo com jquery*/
                    })
                } else if (chave == 'options') {
                    var option = '';
                    var optionValue = '';
                    itens = objeto.options[0];
                    $.each(itens, function (optionKey, optionVal) {
                        option = document.createElement("option");
                        /*Atribuição de options com javascript*/
                        option.setAttribute("value", optionKey);
                        optionValue = document.createTextNode(optionVal);
                        option.appendChild(optionValue);
                        element.append(option);

                    });

                } else {
                    for (var i = 0; i < objeto.child.length; i++) {
                        elementChild = Factory.prototype.createComponent(objeto.child[i]);
                        if (elementChild !== null) {
                            $(element).append(elementChild);
                        }
                    }
                }
            }
        });
        return element;
    };
};

var CrudDefault = function CrudDefault() {

}

CrudDefault.prototype.Construct = function (render) {

    fac = new Factory();

    var data = {
        "component": [
            {
                "element":"div","class":"style_default",
                "child":[
                    {
                        "element":"div",
                        "id":"main_window",
                        "child":[
                            {
                                "element":"div",
                                "id":"read",
                                "child":[
                                    {
                                        "element":"div",
                                        "id":"conteudo_read",
                                        "child":[
                                            {
                                                "element":"div",
                                                "id":"panel_header",
                                                "child":[
                                                    {
                                                        "element":"div",
                                                        "class":"pull-left", /*Responsavel pelo alinhamento a esquerda do option*/
                                                        "child":[
                                                            {
                                                                "element":"div",
                                                                "class":"spacer",
                                                                "child":[
                                                                    {
                                                                        "element":"label",
                                                                        "innerHTML": "Exibir"
                                                                    },
                                                                    {
                                                                        "element": "select",
                                                                        "id": "select_panel",
                                                                        "options": [{"10": "10","30 selected": "30","50": "50","100": "100"}]
                                                                    }
                                                                ]
                                                            }
                                                        ]

                                                    },
                                                    {
                                                        "element":"div",
                                                        "class":"pull-right", /*Responsavel pelo alinhamento a direita do input de pesquisa e label*/
                                                        "child":[
                                                            {
                                                                "element":"div",
                                                                "class":"spacer",
                                                                "child":[
                                                                    {
                                                                        "element":"label",
                                                                        "innerHTML": "Pesquisar"
                                                                    },
                                                                    {
                                                                        "element": "input",
                                                                        "id": "select_panel",
                                                                        "placeholder":""

                                                                    }
                                                                ]
                                                            }
                                                        ]
                                                    }
                                                ]
                                            },
                                            {
                                                "element":"div",
                                                "id":"conteudo_central"
                                            },
                                            {
                                                "element":"div",
                                                "id":"panel_footer",
                                                "child":[
                                                    {

                                                        "element":"div",
                                                        "class":"container",
                                                        "style":[{

                                                            "min-height":"50px",
                                                            "align-items":"center",
                                                            "display":"flex",
                                                            "flex-direction":"row",
                                                            "flex-wrap":"wrap",
                                                            "justify-content":"center",
                                                            "border":"1px solid"

                                                        }],
                                                        "child":[
                                                            {
                                                                "element":"div",
                                                                "id":"centraliza_rodape",
                                                                "style":[{
                                                                    "width":"200px",
                                                                    "min-height":"50px",
                                                                    "align-items":"center",
                                                                    "display":"flex",
                                                                    "flex-direction":"row",
                                                                    "flex-wrap":"wrap",
                                                                    "justify-content":"center",
                                                                    "border":"1px solid"
                                                                }],
                                                                "child":[
                                                                    {
                                                                        "element":"button",
                                                                        "type":"button",
                                                                        "class":"btn btn-primary crud_action",
                                                                        "id" :"add-default",
                                                                        "innerHTML":"Adicionar",
                                                                        "data-action":"create"
                                                                    }
                                                                ]
                                                            }
                                                        ]
                                                    }
                                                ]
                                            }
                                        ]
                                    }
                                ]
                            },
                            {
                                "element":"div",
                                "id":"create",
                                "child":[{
                                    "element":"div",
                                    "id":"insert_content",
                                    "border":"3px solid"
                                }]
                            },
                            {
                                "element":"div",
                                "id":"update"
                            }
                        ]
                    }
                ]
            }
        ]
    };

    element = fac.createComponent(data.component[0]);
    $(render).append(element);
    element = null;

};

CrudDefault.prototype.createInsert = function (render,object) {

    var insertFactory = new Factory();
    var insert = insertFactory.createComponent(object.component[0]);
    $(render).append(insert);
    insert = null;

}










