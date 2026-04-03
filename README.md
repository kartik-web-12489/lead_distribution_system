# 🚀 Lead Distribution System (Filament v5)

A dynamic, rule-based lead distribution system built with Laravel and Filament v5.
This application automatically assigns incoming leads to buyers based on configurable criteria—without hardcoding.

---

## 📌 Features

* ✅ Dynamic rule engine (DB-driven, no hardcoding)
* ✅ Buyer priority-based lead distribution
* ✅ One lead → one buyer (strict enforcement)
* ✅ Unmatched lead handling
* ✅ Filament v5 admin panel
* ✅ Rule builder UI (via repeater)
* ✅ Lead tracking & filtering
* ✅ Lead logs (audit trail)
* ✅ Dashboard widget (stats)

---

## 🧠 How It Works

1. A lead is submitted via API & Front-end Lead Form
2. System evaluates buyers in **priority order**
3. Each buyer has **rules stored in DB**
4. Lead is assigned to the **first matching buyer**
5. If no match → marked as `unmatched`
6. All actions are logged in **lead_logs table**

---

## 🏗️ Tech Stack

* Laravel (PHP)
* Filament v5 (Admin Panel)
* MySQL / PostgreSQL
* REST API

---

## 📂 Project Structure

```
app/
├── Models/
│   ├── User.php
│   ├── Lead.php
│   ├── Buyer.php
│   ├── Rule.php
│   └── LeadLog.php
│
├── Services/
│   └── LeadMatcher.php
│
├── Filament/
│   ├── Resources/
│   │   ├── Buyers/
│   │   ├── Leads/
│   │   └── LeadLogs/
│   │
│   └── Widgets/
│       ├── StatsOverview.php
database/
│
├── migrations/
│ ├── create_buyers_table.php
│ ├── create_rules_table.php
│ ├── create_leads_table.php
│ └── create_lead_logs_table.php
│
├── seeders/
│ ├── BuyerSeeder.php
│ └── DatabaseSeeder.php
│
routes/
│ ├── web.php
│ └── api.php
│
```

---

## ⚙️ Installation

### 1. Clone Repository

```
git clone https://github.com/kartik-web-12489/lead_distribution_system.git
cd lead-distribution
```

### 2. Install Dependencies

```
composer install
```

### 3. Setup Environment

```
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

Update `.env` with your DB credentials.

### 5. Run Migrations + Seeders

```
php artisan migrate --seed
```

### 7. Start Server

```
php artisan serve
```

### 8. Login to Admin Credentials

```
Email : admin@mail.com
Password : 123456
```

---

## 📬 API Endpoint

### ➤ Create Lead

**POST** `/api/leads`

### Request Body

```json
{
  "name": "Alice",
  "email": "alice@example.com",
  "gender": "female",
  "age": 30
}
```

### Response

```json
{
    "status": "matched",
    "name": "Alice",
    "email": "alice@example.com",
    "gender": "female",
    "age": 30,
    "updated_at": "2026-04-03T07:52:58.000000Z",
    "created_at": "2026-04-03T07:52:58.000000Z",
    "id": 1,
    "buyer_id": 1
}
```

---

## 🎛️ Filament Admin Panel

Access:

```
/admin
```

### Modules:

#### 👤 Buyers

* Create buyers with priority
* Define rules dynamically (field, operator, value)

#### 📄 Leads

* View all leads
* See assigned buyer
* Filter by Status
* Filter by Buyer

#### 📜 Lead Logs

* Full audit trail
* Rule evaluation visibility
* Debug unmatched leads

#### 📊 Dashboard

* Total leads
* Matched / unmatched

---

## 🔥 Rule Engine Design

Rules are stored in DB:

| Field  | Operator | Value  |
| ------ | -------- | ------ |
| gender | =        | female |
| age    | <=       | 50     |

Supported operators:

* `=`, `!=`
* `>`, `<`
* `>=`, `<=`

👉 Easily extendable by adding new operators

---

## 📊 Example Buyers

### Buyer 1 -- Standard

* Female leads only

### Buyer 2 -- Premium

* Female + Age ≤ 50

### Buyer 3 -- Open

* No rules (fallback buyer)

---

## 🧪 Testing

Use Postman or any API client.

* Import provided collection
* Test different lead scenarios

---

## 🧠 Design Decisions

* ✔ Service-based architecture
* ✔ Dynamic rule engine (no hardcoding)
* ✔ Priority-driven matching
* ✔ Audit logging for traceability
* ✔ Extensible structure for future rules

---

## 👨‍💻 Author

Kartik Patel
