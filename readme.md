# Loja Virtual – 🏋️‍♀️

Este projeto é uma loja virtual desenvolvida em WordPress com o tema Storefront e o plugin WooCommerce, voltada para a venda de produtos do nicho fitness e academia.

## 🚀 Tecnologias Utilizadas

- **WordPress**
- **WooCommerce**
- **PHP**
- **MySQL**
- **JavaScript (AJAX)**
- **Bootstrap 5**
- **Tema Base:** Storefront
- **Plugin de QR Code (Pix Dinâmico)**
- **Integrações:** WhatsApp, Checkout WooCommerce

---

## 📁 Estrutura do Projeto
- wp-content/
  - themes/
    - mystore/
      - assets/
      - parts/
      - woocommerce/
      - 404.php
      - footer.php
      - front-page.php
      - functions.php
      - header.php
      - headme.md
      - style.css
      - storefront/
  - plugins/
    - search-product/
    - woo-pix-gateway/
    - woocommerce/
    - woocommerce-mercadopago/
    - wp-mail.smtp/
- uploads/



---

## ⚙️ Funcionalidades Personalizadas

- Filtro de produtos por categoria via AJAX.
- Menu offcanvas otimizado com Bootstrap.
- Botão de WhatsApp fixo com mensagem personalizada.
- Layout responsivo (mobile-first).
- Páginas WooCommerce personalizadas com classes Bootstrap.
- Checkout com melhorias visuais e estruturais.
- Mensagens (notices) personalizadas (WooCommerce).

---

## 📦 Instalação e Configuração

1.  **Clone o repositório ou copie os arquivos para o seu projeto WordPress:**

    ```bash
    git clone [https://github.com/odenilsonmarques/mystore]

    (https://github.com/odenilsonmarques/mystore)

    ```

2.  **Ative o tema filho no painel WordPress:**

    * Vá em `Aparência → Temas → Ativar storefront-child`.

3.  **Certifique-se de que os plugins necessários estão instalados e ativados:**

    * WooCommerce
    * Integração Pix (caso customizada, ativar plugin)
    * search-product
    * woocommerce-mercadopago
    * wp-mail.smtp
    

4.  **Configure os menus:**

    * `mobile_menu` para o menu mobile offcanvas
    * `top_menu` para o menu principal do topo

5.  **Configuração de páginas WooCommerce:**

    * Atribua as páginas padrão do WooCommerce (Carrinho, Finalizar Compra, Minha Conta).

---

## 🧪 Ambiente de Desenvolvimento

Para rodar este projeto, você precisará do seguinte ambiente:

* **PHP:** >= 7.4
* **WordPress:** 6.x
* **MySQL:** 5.7+
* **Servidor local:** LocalWP, XAMPP, Laragon ou Docker
* **Navegador recomendado:** Chrome ou Firefox

---

## 🧩 Funcionalidades Extras

* **QR Code Dinâmico (Pix):** Integração pronta para gerar QR Code via API.
* **Estilização com Bootstrap:** Utilização de classes de grid, botões e alertas para um design responsivo.
* **Suporte a múltiplos tamanhos de tela:** Media queries otimizadas para uma experiência consistente em diferentes dispositivos.
* **Menu Offcanvas:** Inclui botão de contato direto via WhatsApp.