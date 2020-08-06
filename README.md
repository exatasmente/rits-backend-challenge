# Backend Challenge - Rits Tecnologia

## Para Executar :
O projeto utiliza o Docker Compose para executar :
`docker-compose up -d --build`


## A Aplicação
Para este desafio, comecei pelo levantamento de requisitos para o projeto, depois fiz o diagrama de entidade relacionamento do banco de dados,
e utilizando o padrão de `Repository` e fiz 3 serviços: 
 - ClienteService 
 - PedidoService
 - ProdutoService
 
 ### Cliente Service
 > Serviço responsável por Cadastrar Clientes e Listar as Informações de um Cliente específico,
 > utilizando o `Repository` `ClienteRepository` para comunicação com o banco de dados 
 
### Pedido Service
 > Serviço responsável por Cadastrar Pedidos, Listar Pedidos , Exibir Pedido e Cancelar Pedido de um Cliente específico,
 > utilizando o `Repository` `PedidoRepository` para comunicação com o banco de dados 
 
### Produto Service
 > Serviço responsável por Listar Produtos e Pesquisar Produtos,
 > utilizando o `Repository` `ProdutoRepository` para comunicação com o banco de dados 
     
### Primeiro Desafio
Após implementar a camada de Serviço e o Repository, foi implementado a API na ordem :
 - Cliente
    - Cadastro
    - Listar Pedidos 
 - Pedido 
    - Cadastro Pedido
    - Excluir Pedido
    - Exibir Pedido
    - Cancelar Pedido
 - Produto
    - Listar Produtos
    - Buscar Produto

## Segundo Desafio - Validadores 
Utilizando o  `Validator` do Laravel e a definição de uma `Interface` chamada `ValidatorInterface` 
que possui 3 métodos: 
 - rules
 - messages
 - validate
 
Com  classe abstrata `BaseValidator` implementando a Interface,  
assim cada validação possui uma classe que é instanciada recebendo os dados que serão validados 

## API
 Os Endpoints para a API são :
 
  | Method   |      Endpoint                           |
  |----------|-----------------------------------------|
  | POST     |  /signup                                |
  | GET      |  /cliente/{cliente}                     |
  | GET      |  /cliente/{cliente}/pedido              |
  | POST     | /cliente/{cliente}/pedido               |
  | GET      | /cliente/{cliente}/pedido/{pedido}      |
  | DELETE   | /cliente/{cliente}/pedido/{pedido}      |
  | GET      | /produtos                               |
  | GET      | /produtos/{produto}                     |
  | GET      | /search/produtos                        |
  
#### POST /signup
  Para o Cadastro a API recebe os campos :
   - `email` : `obrigatório` `email` `único`
   - `name`  : `obrigatório` `min:3`
   - `password` : `obrigatório` `min:6` 
   - `telefone` : `obrigatório` `regex:/\([0-9]{2}\)[0-9]{9}/` `único`
   - `endereço` : `obrigatório`
   
#### GET /cliente/\{cliente\}
   - \{cliente\} : `int` , `exists:users`
>Se cliente não existe a API retorna o `status` `404`   
   
#### GET /cliente/\{cliente\}/pedido/
   - Entrada : \{cliente\} : `int` , `exists:users`
   - Parâmetros (opcionais) : 
          - paginate : `boolean` `default:false` 
          - paginate_items : `integer` `min:1` `max:50` (caso seja inválido o valor será o padrão 15)
   - Resposta : 
   
 ```
 {
  "data": {
    "id": 3,
    "nome": "Norene Jacobson",
    "email": "yhirthe@example.org",
    "endereco": "82757 Fritsch Meadows Apt. 584\nNew Jailynfurt, FL 60270",
    "telefone": "1-489-861-3272",
    "pedidos": [
      {
        "id": 3,
        "produtos": [
          {
            "id": 16,
            "nome": "Reese Pacocha",
            "preco": "88.44",
            "quantidade": 4
          },
          {
            "id": 37,
            "nome": "Rosalia Konopelski",
            "preco": "113.68",
            "quantidade": 3
          },
          {
            "id": 58,
            "nome": "Ms. Leonie Hill I",
            "preco": "779.25",
            "quantidade": 4
          },
          {
            "id": 59,
            "nome": "Tillman Boyle",
            "preco": "326.91",
            "quantidade": 4
          },
          {
            "id": 74,
            "nome": "Merl Stanton",
            "preco": "268.57",
            "quantidade": 1
          }
        ],
        "status": "Entregue",
        "created_at": "2020-08-05 13:42:24"
      }
    ]
  }
}    
```
>       
>Se cliente não existe a API retorna o `status` `404`


#### GET /cliente/\{cliente\}/pedido/\{pedido\}
   - \{cliente\} : `int` , `exists:users`
   - \{pedido\} : `int` , `exists:pedido`
   - Resposta : 
```
{
  "data": {
    "id": 3,
    "produtos": [
      {
        "id": 16,
        "nome": "Reese Pacocha",
        "preco": "88.44",
        "quantidade": 4
      },
      {
        "id": 37,
        "nome": "Rosalia Konopelski",
        "preco": "113.68",
        "quantidade": 3
      },
      {
        "id": 58,
        "nome": "Ms. Leonie Hill I",
        "preco": "779.25",
        "quantidade": 4
      },
      {
        "id": 59,
        "nome": "Tillman Boyle",
        "preco": "326.91",
        "quantidade": 4
      },
      {
        "id": 74,
        "nome": "Merl Stanton",
        "preco": "268.57",
        "quantidade": 1
      }
    ],
    "status": "Entregue",
    "created_at": "2020-08-05 13:42:24"
  }
}
```   
>Se o pedido não pertence ao cliente, ou não existe a API retorna o `status` `404`

#### POST /cliente/\{cliente\}/pedido
   - \{cliente\} : `int` , `exists:users`
   - Recebe :  `array` 
```
{
  "produtos" : [
    {
      "id" : 10,
      "quantidade" : 2
    },
    {
      "id" : 10,
      "quantidade" : 2
    }
  ]
}
```
   - Resposta :
```
{
  "data": {
    "id": 189,
    "produtos": [
      {
        "id": 10,
        "nome": "Stan Ward DVM",
        "preco": "112.31",
        "quantidade": 2
      }
    ],
    "status": "Pendente",
    "created_at": "2020-08-05 20:28:54"
  }
}
```
 ### DELETE /cliente/\{cliente\}/pedido/\{pedido\}
   - \{cliente\} : `int` , `exists:users`
   - \{pedido\} : `int` , `exists:pedido` 
   - Resposta :
```
{
  "id": 189,
  "user_id": 10,
  "status": 5,
  "created_at": "2020-08-05T20:28:54.000000Z",
  "updated_at": "2020-08-05T20:31:09.000000Z"
}
```

### GET /produtos
   - \{cliente\} : `int` , `exists:users`
   - \{pedido\} : `int` , `exists:pedido`
   - Parâmetros (opcionais) : 
       - paginate : `boolean` 
       - paginate_items : `integer` `min:1` `max:50` (caso seja inválido o valor será o padrão 15)
   - Resposta Sem Paginação :
```
{
  "data": [
    {
      "id": 10,
      "produtos": [
        {
          "id": 3,
          "nome": "Prof. Shayna Connelly IV",
          "preco": "289.33",
          "quantidade": 2
        },
        {
          "id": 9,
          "nome": "Talia Christiansen",
          "preco": "846.44",
          "quantidade": 1
        },
        {
          "id": 35,
          "nome": "Domenick Boyer",
          "preco": "479.89",
          "quantidade": 1
        },
        {
          "id": 77,
          "nome": "Myron Emmerich",
          "preco": "334.29",
          "quantidade": 2
        },
        {
          "id": 86,
          "nome": "Mr. Ramon Spencer III",
          "preco": "243.07",
          "quantidade": 2
        }
      ],
      "status": "Pendente",
      "created_at": "2020-08-05 13:42:24"
    },
    {
      "id": 188,
      "produtos": [
        {
          "id": 10,
          "nome": "Stan Ward DVM",
          "preco": "112.31",
          "quantidade": 2
        }
      ],
      "status": "Pendente",
      "created_at": "2020-08-05 20:23:55"
    },
    {
      "id": 189,
      "produtos": [
        {
          "id": 10,
          "nome": "Stan Ward DVM",
          "preco": "112.31",
          "quantidade": 2
        }
      ],
      "status": "Cancelado",
      "created_at": "2020-08-05 20:28:54"
    }
  ]
}

```
   - Resposta com Paginação :
```
{
  "data": [
    {
      "id": 2,
      "produtos": [
        {
          "id": 13,
          "nome": "Gino Heaney",
          "preco": "737.93",
          "quantidade": 1
        },
        {
          "id": 14,
          "nome": "Monserrate Williamson",
          "preco": "597.01",
          "quantidade": 2
        },
        {
          "id": 53,
          "nome": "Ruthe Purdy",
          "preco": "616.72",
          "quantidade": 3
        },
        {
          "id": 86,
          "nome": "Mr. Ramon Spencer III",
          "preco": "243.07",
          "quantidade": 3
        },
        {
          "id": 89,
          "nome": "Cayla Towne",
          "preco": "10.95",
          "quantidade": 1
        }
      ],
      "status": "Entregue",
      "created_at": "2020-08-05 13:42:24"
    }
  ],
  "links": {
    "first": "http:\/\/localhost:8080\/api\/cliente\/2\/pedido?page=1",
    "last": "http:\/\/localhost:8080\/api\/cliente\/2\/pedido?page=88",
    "prev": null,
    "next": "http:\/\/localhost:8080\/api\/cliente\/2\/pedido?page=2"
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 8,
    "path": "http:\/\/localhost:8080\/api\/cliente\/2\/pedido",
    "per_page": 10,
    "to": 10,
    "total": 88
  }
```

#### GET  /produtos/\{produto\}
  - \{produto\} : `int` , `exists:produtos`
  - Resposta :
```
{
  "data": {
    "id": 1,
    "nome": "Assunta Schroeder",
    "preco": "685.41"
  }
}
```

#### GET  /search/produtos
  - Parâmetros : 
      - nome:   `obrigatório` `string`
      - preco_min :`regex:/^\d*(\.\d{2})?$/` `min:0`
      - preco_max :`regex:/^\d*(\.\d{2})?$/` `min:1`
      - paginate : `boolean` 
     - paginate_items : `integer` `min:1` `max:50` (caso seja inválido o valor será o padrão 15)
  - Resposta :
```
{
  "data": [
    {
      "id": 16,
      "nome": "Reese Pacocha",
      "preco": "88.44"
    },
    {
      "id": 21,
      "nome": "Taryn Yundt II",
      "preco": "32.03"
    },
    {
      "id": 26,
      "nome": "Veronica Klocko",
      "preco": "87.19"
    },
    {
      "id": 32,
      "nome": "Devyn Haley",
      "preco": "44.80"
    },
    {
      "id": 36,
      "nome": "Mazie Goyette",
      "preco": "49.37"
    },
    {
      "id": 42,
      "nome": "Raven Ebert",
      "preco": "30.23"
    },
    {
      "id": 54,
      "nome": "Macie Cassin",
      "preco": "61.94"
    },
    {
      "id": 64,
      "nome": "Nova Konopelski",
      "preco": "68.74"
    },
    {
      "id": 66,
      "nome": "Haley Watsica",
      "preco": "88.75"
    },
    {
      "id": 69,
      "nome": "Prof. Adriana Gibson",
      "preco": "75.49"
    },
    {
      "id": 75,
      "nome": "Vanessa Hoeger",
      "preco": "92.54"
    },
    {
      "id": 88,
      "nome": "Sallie Ritchie",
      "preco": "38.01"
    },
    {
      "id": 97,
      "nome": "Price Aufderhar IV",
      "preco": "22.72"
    }
  ]
}
```

### Ambiente Web (Admin)
Para o ambiente web utilizei o pacote `Laravel Livewire`, que permite criar aplicações web reativas utilizando somente PHP.
No projeto também utilizei as Frameworks `TailwindCSS`  e `AlpineJs`.
Com essas 3 ferramentas, desenvolvi o front-end com uma interface reativa utilizando somente PHP.




