# 🧳 Travel Guia API

O **Travel Guia API** é uma aplicação desenvolvida em PHP usando o framework Laravel e integração com IA. Ela ajuda usuários a planejarem suas viagens de forma prática e segura, oferecendo as seguintes funcionalidades:

## 🚀 Funcionalidades

- **Itinerário Personalizado**: Crie um plano para cada dia que irá passar, para aproveitar ao máximo a viagem.
- **Estimativa de Gastos**: Obtenha uma média de custos com base no destino e duração da viagem.
- **Segurança**: tenha informção sobre violência, áreas perigosas e dicas para viajar de forma mais segura.
- **Integração com Google Gemini**: utiliza a API do Google Gemini para obter as informações atualizadas.

---

## 📋 Rotas da API

Abaixo estão listadas as principais rotas da API

### 🔹 **Autenticação**
| Método | Rota             | Descrição                      | Parâmetros          |
|--------|------------------|--------------------------------|---------------------|
| POST   | `api/v1/travelPlan/allPlan`     | Retorna o plano de viagem completo.       | `travel_location`, `arrival_date`  `departure_date`|

---


## 📚 Requisitos

- **PHP** >= 8.1
- **Composer** >= 2.x
- **Google Gemini API Key** (obrigatório para integração)

---


## 🚀 Guia de Instalação

### 1. Clone o Repositório

```bash
git clone https://github.com/seu-usuario/travel-planner-api.git
cd travel-planner-api
```

### 2. Adicione sua chave gerada no arquivo .env

```bash
API_GEMINI_KEY=""


                                                                       


