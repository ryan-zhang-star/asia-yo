## 安裝

1. Clone 這個專案到您的本地環境。
2. 在專案目錄中執行以指令
    1. 複製 .env.example 檔案並將其重新命名為 .env
    ```
    cp .env.example .env
    ```
    2. 生成應用程式金鑰
    ```
    php artisan key:generate
    ```
    3. 開啟服務
    ```
    sail up
    ```

## Endpoint

### GET /api/exchange

進行貨幣兌換換算。

#### 請求參數

- source：原始貨幣。
- target：目標貨幣。
- amount：原始貨幣的金額。

#### 請求範例

GET /api/exchange?source=USD&target=JPY&amount=$1,234.00

#### 回應範例

```
{
    "msg": "success",
    "amount": "$137,962.43",
}
```

## 測試

### 執行測試

```
sail artisan test
```
