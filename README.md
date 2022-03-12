# Swoole Chat

Projeto para estudo.

Chat criado utilizando funcionalidades Socket do swoole PHP.

O Front-end foi implementado seguindo a arquitetura CSS - BEM (Block Element Modifier). 

![image](https://user-images.githubusercontent.com/45777832/158004724-b5665f64-9665-4f42-93dd-f5e5e4495f0f.png)


## 🚀 Começando

Essas são as instruções para execução do projeto.

Consulte **Instalação** para saber como implantar o projeto.

### 📋 Pré-requisitos

De que coisas você precisa para instalar o software e como instalá-lo?

```
- PHP 7+ (versão utilizada 7.4.20)
- Docker
- Composer
```


### 🔧 Instalação

Para realizar a instalação, seguir os seguintes passos:

```
1) Realizar instalação dos pré-requisitos
2) Criar um container a partir do arquivo dockerfile que está no repositório
3) Executar no terminal (composer install)
4) Após criar o container basta iniciá-lo:
    -  docker run -itv DIRETORIO_DO_PASTA:/app -w /app -p 8080:8080 php-swoole bash
5) Quando o container estiver ativo, basta executar o arquivo src/server/index.php
6) Abrir diferentes abas no navegador do arquivo src/client/index.php e se divertir testando o chat

```


## 🛠️ Construído utilizando


- [Swoole](https://openswoole.com/)
- [Docker](https://www.docker.com/)
