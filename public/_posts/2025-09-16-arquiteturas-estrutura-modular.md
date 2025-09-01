---
layout: post
title:  "MVC: Estrutura Modular - Construindo com Blocos de Lego"
date:   2025-09-12 00:51:01 +0000
categories: php
---

Uma **estrutura modular** é a prática de dividir seu sistema em partes independentes e coesas, como se fossem blocos de Lego. Cada módulo tem uma responsabilidade específica e pode ser usado ou substituído sem afetar o resto do sistema.

Imagine um sistema de e-commerce. Sem uma estrutura modular, a lógica para enviar e-mails de confirmação, processar pagamentos e gravar eventos de log poderia estar misturada em um único arquivo de "pedido". Isso seria um pesadelo para dar manutenção.

-----

### O Que É um Módulo?

Um módulo é um componente de software com um propósito único. Ele encapsula sua própria lógica, dados e funcionalidades. As classes `Logger` e `EmailSender` em seu exemplo são ótimos modelos de módulos.

#### **Módulo de Log**

A classe `Logger` tem uma única responsabilidade: gravar logs. Ela não se importa com quem a chama ou por que. Sua única função é receber uma mensagem e salvá-la em um arquivo.

```php
// Módulo de Log
class Logger {
    public static function log($mensagem) {
        // A lógica para salvar a mensagem em um arquivo
        file_put_contents('log.txt', $mensagem . PHP_EOL, FILE_APPEND);
    }
}
```

#### **Módulo de E-mail**

A classe `EmailSender` tem uma única responsabilidade: enviar e-mails. Ela não sabe nada sobre logs ou processamento de pedidos; ela apenas se concentra em enviar a mensagem para o destinatário certo.

```php
// Módulo de Email
class EmailSender {
    public static function enviar($destinatario, $mensagem) {
        // A lógica para enviar o email usando um serviço de e-mail
        // return mail($destinatario, 'Assunto', $mensagem);
        
        // Simulação de envio
        return "Email para $destinatario: $mensagem";
    }
}
```

-----

### A Vantagem da Modularidade

A principal vantagem de uma estrutura modular é o baixo **acoplamento**. O acoplamento se refere a quão dependentes os módulos são uns dos outros. Em um sistema com baixo acoplamento, um módulo pode ser alterado ou substituído sem que outros módulos sejam afetados.

Vamos ver como isso funciona na prática:

```php
// Uso integrado
Logger::log("Enviando email...");
echo EmailSender::enviar("user@exemplo.com", "Olá!");
```

O código que usa esses módulos não precisa saber como eles funcionam internamente. Ele apenas chama `Logger::log()` para registrar um evento e `EmailSender::enviar()` para mandar um e-mail. Se, no futuro, você quiser trocar o método de log ou o serviço de e-mail, basta reescrever o código dentro das classes `Logger` ou `EmailSender`. O resto do seu sistema continuará funcionando perfeitamente, sem nenhuma alteração.

Essa separação garante que seu código seja mais **reutilizável** e **fácil de dar manutenção**, permitindo que você construa sistemas complexos com a mesma facilidade que constrói com blocos de Lego.