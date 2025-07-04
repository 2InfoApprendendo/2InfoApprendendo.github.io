# Exercicios de Classes e Métodos para o Teams

> 🎯 **Objetivo**: Criar o **mínimo de classes** para aplicar o **máximo de conceitos**, como herança, composição, polimorfismo, métodos mágicos, autenticação, tratamento de exceções e testes unitários.

---

## 1. Modelagem de Objetos e Métodos

### Classe `Usuario`
- Atributos: `nome`, `email`, `senha`
- Métodos:
  - `validar_senha()`
  - `autenticar(email, senha)`
  - `alterar_senha(nova_senha)`
  - `exibir_informacoes()`

### Classe `Conta`
- Atributos: `numero`, `titular` (objeto `Usuario`), `saldo`
- Métodos:
  - `depositar(valor)`
  - `sacar(valor)`
  - `transferir(outra_conta, valor)`
  - `exibir_saldo()`
- Métodos mágicos:
  - `__str__`
  - `__add__`
  - `__eq__`

### Classe `Veiculo` e Subclasses
- Atributos: `marca`, `modelo`, `ano`, `preco`
- Subclasses: `Carro`, `Moto`
- Métodos:
  - `exibir_detalhes()`
  - `atualizar_preco(novo_preco)`

### Classe `Financiamento`
- Atributos: `valor`, `taxa_juros`, `prazo`
- Métodos:
  - `calcular_parcela()`
  - `exibir_informacoes()`

---

## 2. Herança e Polimorfismo

### Classe `Animal` e Subclasses
- Atributo: `nome`, `total`
- Subclasses: `Cachorro`, `Gato`
- Método:
  - `fazer_som()` – personalizado em cada subclasse
  - `exibir_informacoes()` - exibe nome e som do animal
  - `especies()` - retorna a espécie do animal
  - `total_animais()` – conta quantos animais foram criados
- Métodos mágicos:
    - `__str__` – exibe nome e som do animal
    - `__eq__` – compara dois animais pelo nome
    - `__lt__` – compara dois animais pelo nome (ordenação)
    - `__add__` – concatena nomes de dois animais

### Classe `Forma` e Subclasses
- Método abstrato: `calcular_area()`
- Subclasses:
  - `Circulo`
  - `Retangulo`
  - `Triangulo`

### Classe `Funcionario` e Subclasses
- Atributos: `nome`, `salario`
- Subclasses: `Gerente`, `Desenvolvedor`
- Método:
  - `calcular_bonus()` (10% ou 5%)

---

## 3. Métodos Mágicos

### Classe `Ponto`
- Atributos: `x`, `y`
- Métodos mágicos:
  - `__add__`, `__sub__`, `__str__`

### Classe `Livro`
- Atributos: `titulo`, `autor`, `ano_publicacao`
- Métodos mágicos:
  - `__str__` → `"Título - Autor (Ano)"`
  - `__eq__` → compara título e autor
  - `__lt__` → compara ano para ordenação

### Classe `Data`
- Atributos: `dia`, `mes`, `ano`
- Métodos mágicos:
  - `__str__`, `__eq__`
  - `__add__` → adiciona dias
  - `__sub__` → diferença em dias

---

## 4. Autenticação e Administração

### Classe `SistemaAutenticacao`
- Atributo: `usuarios` (lista de `Usuario`)
- Métodos:
  - `cadastrar_usuario(usuario)`
  - `login(email, senha)`
  - `logout(usuario)`

### Classe `Administrador` (herda de `Usuario`)
- Métodos:
  - `gerenciar_usuarios()`
  - `remover_usuario(email)`

---

## 5. Exceções Personalizadas

### `UsuarioInvalido(Exception)`
- Usada em `Usuario` e `SistemaAutenticacao`
- Método: `__str__`

### `ContaInvalida(Exception)`
- Usada em `Conta`
- Exemplo: saque maior que saldo, depósito negativo

### `UsuarioNaoEncontrado(Exception)`
- Usada no `login()` de `SistemaAutenticacao`
- Método: `__str__`

---

## 6. Testes Unitários

### Classe `Calculadora`
- Métodos: `soma`, `subtracao`, `multiplicacao`, `divisao`
- Crie testes com `unittest`

### Classe `StringUtils`
- Métodos: `inverter(string)`, `contar_vogais(string)`, `remover_espacos(string)`
- Testes unitários aplicados

---

## 💡 Dicas
- Reutilize suas classes sempre que possível.
- Use herança ou composição para evitar código repetido.
- Crie testes para validar suas classes.
- Prefira nomes de classes e métodos claros e descritivos.
