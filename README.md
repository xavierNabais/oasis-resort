# Oasis Resort - Sistema de Gestão de Reservas

**[Versão em Português](#oasis-resort---sistema-de-gestão-de-reservas) | [English Version](#oasis-resort---room-reservation-management-system)**

O **Oasis Resort** é uma aplicação web sofisticada desenvolvida para a gestão eficiente de reservas de quartos de hotel. Este projeto oferece uma plataforma completa para os clientes efetuarem reservas de forma intuitiva e segura, além de fornecer um painel administrativo robusto para gerir quartos e reservas.

## 📑 Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Estrutura da Base de Dados](#estrutura-da-base-de-dados)
- [Uso](#uso)

## <a name="sobre-o-projeto"></a> 🛠 Sobre o Projeto

O **Oasis Resort** foi desenvolvido com o objetivo de modernizar e optimizar a gestão de reservas de um resort. Através desta plataforma, os clientes podem navegar, escolher e reservar quartos, enquanto os administradores podem gerir facilmente as operações do resort, garantindo uma experiência fluida e integrada para todos os utilizadores.

## <a name="funcionalidades"></a> ✨ Funcionalidades

### Para Clientes:

- 🔐 **Autenticação**: Registo, login e logout, garantindo acesso seguro às funcionalidades do sistema.
- 🏨 **Pesquisa e Navegação de Quartos**: Visualização detalhada dos quartos disponíveis, com descrições e imagens.
- 📅 **Reserva de Quartos**: Processo de reserva simplificado, com verificação de disponibilidade em tempo real.
- 💸 **Códigos de Desconto**: Aplicação de códigos de desconto durante o processo de reserva para ofertas especiais e promoções.
- 🔗 **Integração com API de Pagamento**: Pagamentos seguros e integrados para facilitar o processo de reserva.
- 👤 **Gestão de Perfil**: Actualização de informações pessoais e visualização do histórico de reservas.

### Para Administradores:

- 📊 **Painel Administrativo**: Acesso exclusivo ao painel para gestão das operações do resort.
- 🛏️ **Gestão de Quartos**: Adição, edição e remoção de quartos, com controlo total sobre as informações exibidas.
- 📋 **Gestão de Reservas**: Visualização e administração de todas as reservas efectuadas, com opções para edição e cancelamento.
- 📈 **Relatórios e Logs**: Acesso a logs de atividades e geração de relatórios para monitorizar o desempenho do resort.

## <a name="tecnologias-utilizadas"></a> 💻 Tecnologias Utilizadas

- **Backend**: Laravel (Framework PHP) para uma estrutura sólida e escalável.
- **Base de Dados**: MySQL, utilizado para armazenamento de dados de clientes, quartos e reservas.
- **Autenticação**: Utilização de guards para diferenciar entre clientes e funcionários.
- **API de Pagamento**: Integração segura para processar pagamentos de forma eficiente e confiável.

- **Frontend**:
  - Blade (Motor de templates do Laravel) para renderização de páginas dinâmicas.
  - HTML5, CSS3 e JavaScript para uma interface de utilizador responsiva e moderna.
  - Bootstrap para um design consistente e de fácil utilização.

## <a name="estrutura-da-base-de-dados"></a> 🗂️ Estrutura da Base de Dados

A base de dados do Oasis Resort foi projetada para lidar eficientemente com vários aspectos da gestão do resort, incluindo clientes, quartos, reservas e pagamentos. Abaixo está uma visão geral simples das tabelas principais:

### Visão Geral das Tabelas:

- **clients**:
  - `id`: Primary key.
  - `name`: Nome completo do cliente.
  - `email`: Endereço de email do cliente (único).
  - `phone`: Número de telefone do cliente.
  - `password`: Senha encriptada.
  - `created_at`: Timestamp de registro do cliente.
  - `updated_at`: Timestamp da última atualização dos dados do cliente.

- **employees**:
  - `id`: Primary key.
  - `name`: Nome completo do funcionário.
  - `email`: Endereço de email do funcionário (único).
  - `password`: Senha encriptada.
  - `role`: Cargo do funcionário (ex.: admin, gerente).
  - `created_at`: Timestamp de registro do funcionário.
  - `updated_at`: Timestamp da última atualização dos dados do funcionário.

- **rooms**:
  - `id`: Primary key.
  - `name`: Nome do quarto.
  - `type`: Tipo de quarto (ex.: solteiro, duplo, suíte).
  - `description`: Descrição detalhada do quarto.
  - `price_per_night`: Preço por noite.
  - `image_url`: Endereço URL da imagem do quarto.
  - `created_at`: Timestamp de adição do quarto.
  - `updated_at`: Timestamp da última atualização dos dados do quarto.

- **reservations**:
  - `id`: Primary key.
  - `client_id`: Foreign key referência `clientes`.
  - `room_id`: Foreign key referência `quartos`.
  - `check_in`: Data de check-in.
  - `check_out`: Data de check-out.
  - `total_price`: Preço total da reserva.
  - `number_of_guests`: Número de hóspedes na reserva.
  - `status`: Status da reserva (ex.: confirmada, cancelada).
  - `created_at`: Timestamp de realização da reserva.
  - `updated_at`: Timestamp da última atualização da reserva.

- **payments**:
  - `id`: Primary key.
  - `reservation_id`: Foreign key referência `reservas`.
  - `amount`: Quantia paga.
  - `payment_date`: Data do pagamento.
  - `payment_method`: Método usado para o pagamento (ex.: cartão de crédito, PayPal).
  - `status`: Status do pagamento (ex.: completo, pendente).
  - `created_at`: Timestamp de processamento do pagamento.
  - `updated_at`: Timestamp da última atualização do registro de pagamento.
 
- **logs**:
  - `id`: Chave primária.
  - `action`: Ação realizada (descrição do log).
  - `performed_by`: Identificação do usuário que realizou a ação.
  - `created_at`: Timestamp de quando a ação foi registrada.
  - `updated_at`: Timestamp da última atualização do registro de log.



Esta estrutura garante que o sistema possa lidar com o ciclo completo de reservas de quartos, desde o registo de clientes e a gestão de quartos até as reservas e pagamentos.

## <a name="uso"></a> 🚀 Uso

1. **Acesso ao Sistema**:
   - Clientes podem aceder ao site principal para visualizar quartos e realizar reservas.
   - Administradores acedem ao painel administrativo para gerir o sistema.

2. **Autenticação e Navegação**:
   - A plataforma exige autenticação para aceder a funcionalidades críticas, garantindo segurança.
   - Após o login, os clientes podem navegar pelo catálogo de quartos e efectuar reservas.

3. **Processamento de Pagamentos**:
   - O sistema integra uma API de pagamento para facilitar transacções seguras directamente pela plataforma.

4. **Gestão de Conteúdo**:
   - Administradores têm controlo total sobre o conteúdo do site, podendo adicionar ou remover quartos, visualizar reservas e monitorizar a atividade dos utilizadores. **Content Management**:
   - Administrators have full control over site content, being able to add or remove rooms, view reservations, and monitor user activity.


# Oasis Resort - Room Reservation Management System

**[Portuguese Version](#oasis-resort---sistema-de-gestão-de-reservas) | [English Version](#oasis-resort---room-reservation-management-system)**

**Oasis Resort** is a sophisticated web application developed for the efficient management of hotel room reservations. This project provides a comprehensive platform for clients to make reservations in an intuitive and secure manner while offering a robust administrative panel to manage rooms, reservations, and financial transactions.

## 📑 Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Database Structure](#database-structure)
- [Usage](#usage)

## <a name="about-the-project"></a> 🛠 About the Project

**Oasis Resort** was developed to modernize and optimize the reservation management of a resort. The platform allows clients to browse, choose, and book rooms, while administrators can efficiently manage the resort's operations. The result is a seamless and integrated experience for both users and staff.

## <a name="features"></a> ✨ Features

### For Clients:

- 🔐 **Authentication**: User registration, login, and logout to ensure secure access to system features.
- 🏨 **Room Search and Navigation**: Detailed view of available rooms with descriptions and images.
- 📅 **Room Booking**: Simplified booking process with real-time availability check.
- 💸 **Discount Codes**: Application of discount codes during the booking process for special offers and promotions.
- 🔗 **Payment API Integration**: Secure and integrated payments to facilitate the reservation process.
- 👤 **Profile Management**: Update personal information and view reservation history.

### For Administrators:

- 📊 **Administrative Panel**: Exclusive access to a control panel for managing resort operations.
- 🛏️ **Room Management**: Add, edit, and remove rooms with full control over displayed information.
- 📋 **Reservation Management**: View and manage all reservations, with options to edit and cancel.
- 📈 **Reports and Logs**: Access activity logs and generate reports to monitor resort performance.

## <a name="technologies-used"></a> 💻 Technologies Used

- **Backend**: Laravel (PHP Framework) for a solid and scalable structure.
- **Database**: MySQL, used for storing client, room, and reservation data.
- **Authentication**: Use of guards to differentiate between clients and employees.
- **Payment API**: Secure integration to process payments efficiently and reliably.

- **Frontend**:
  - Blade (Laravel Templating Engine) for rendering dynamic pages.
  - HTML5, CSS3, and JavaScript for a responsive and modern user interface.
  - Bootstrap for consistent and user-friendly design.

## <a name="database-structure"></a> 🗂️ Database Structure

The database for Oasis Resort is designed to efficiently handle various aspects of hotel management, including clients, rooms, reservations, and payments. Below is a simple overview of the key tables:

### Tables Overview:

- **clients**:
  - `id`: Primary key.
  - `name`: The client's full name.
  - `email`: The client's email address (unique).
  - `phone`: The client's phone number.
  - `password`: Encrypted password.
  - `created_at`: Timestamp of when the client was registered.
  - `updated_at`: Timestamp of the last update to the client's data.

- **employees**:
  - `id`: Primary key.
  - `name`: The employee's full name.
  - `email`: The employee's email address (unique).
  - `password`: Encrypted password.
  - `role`: The role of the employee (e.g., admin, manager).
  - `created_at`: Timestamp of when the employee was registered.
  - `updated_at`: Timestamp of the last update to the employee's data.

- **rooms**:
  - `id`: Primary key.
  - `name`: Room name.
  - `type`: Type of the room (e.g., single, double, suite).
  - `description`: Detailed description of the room.
  - `price_per_night`: Price per night.
  - `image_url`: Url for the image of the room.
  - `created_at`: Timestamp of when the room was added.
  - `updated_at`: Timestamp of the last update to the room's data.

- **reservations**:
  - `id`: Primary key.
  - `client_id`: Foreign key referencing `clients`.
  - `room_id`: Foreign key referencing `rooms`.
  - `check_in`: Check-in date.
  - `check_out`: Check-out date.
  - `total_price`: Total price of the reservation.
  - `number_of_guests`: The number of guests for the reservation.
  - `status`: Reservation status (e.g., confirmed, canceled).
  - `created_at`: Timestamp of when the reservation was made.
  - `updated_at`: Timestamp of the last update to the reservation.

- **payments**:
  - `id`: Primary key.
  - `reservation_id`: Foreign key referencing `reservations`.
  - `amount`: Amount paid.
  - `payment_date`: Date of payment.
  - `payment_method`: Method used for payment (e.g., credit card, PayPal).
  - `status`: Payment status (e.g., completed, pending).
  - `created_at`: Timestamp of when the payment was processed.
  - `updated_at`: Timestamp of the last update to the payment record.
 
- **logs**:
  - `id`: Primary key.
  - `action`: Description of the action performed (log entry).
  - `performed_by`: Identification of the user who performed the action.
  - `created_at`: Timestamp of when the action was logged.
  - `updated_at`: Timestamp of the last update to the log entry.


This structure ensures that the system can handle the full lifecycle of room bookings, from client registration and room management to reservations and payments.

## <a name="usage"></a> 🚀 Usage

1. **System Access**:
   - Clients can access the main site to view rooms and make reservations.
   - Administrators access the admin panel to manage the system.

2. **Authentication and Navigation**:
   - The platform requires authentication to access critical features, ensuring security.
   - After logging in, clients can browse the room catalog and make reservations.

3. **Payment Processing**:
   - The system integrates a payment API to facilitate secure transactions directly through the platform.

4. **Content Management**:
   - Administrators have full control over site content, being able to add or remove rooms, view reservations, and monitor user activity.
