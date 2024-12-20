# 🧳 Planejador de Viagem API

Aplicação desenvolvida em PHP utilizando o framework Symfony e integração com IA. Ela ajuda usuários a planejarem suas viagens de forma prática e segura, oferecendo as seguintes funcionalidades:

## 🚀 Funcionalidades

- **Itinerário Personalizado**: Crie um plano para cada dia que irá passar, para aproveitar ao máximo a viagem.
- **Estimativa de Gastos**: Obtenha uma média de custos com base no destino e duração da viagem.
- **Segurança**: tenha informção sobre violência, áreas perigosas e dicas para viajar de forma mais segura.
- **Integração com Google Gemini**: utiliza a API do Google Gemini para obter as informações atualizadas.

---

## 📋 Rotas da API

Abaixo estão listadas as principais rotas da API

| Método | Rota             | Descrição                      | Parâmetros          |
|--------|------------------|--------------------------------|---------------------|
| POST   | `api/v1/travel/all_plan`     | Retorna o plano de viagem completo.       | `travel_location`, `arrival_date`  `departure_date`|
| POST   | `api/v1/travel/itinerary`     | Retorna o itinerário da viagem.       | `travel_location`, `arrival_date`  `departure_date`|
| POST   | `api/v1/travel/climate_information`     | Retorna informações clima do local.       | `travel_location`|
| POST   | `api/v1/travel/safety_information`     | Retorna informações sobre violência do local.       | `travel_location`|

---


## 📚 Requisitos

- **PHP** >= 8.2
- **Composer** >= 2.x
- **Google Gemini API Key** (obrigatório para integração)

---

### Clone
```bash
git clone https://github.com/samueldmonteiro/api-planejador-viagem-IA
cd api-planejador-viagem-IA
```
### Instalar Dependências
```bash
composer install
```
### Criar .env.local
```bash
cp .env .env.local
```
### Adicionar chave de API do Gemini
```bash
API_GEMINI_KEY=sua_chave  
```

