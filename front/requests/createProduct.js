const createProduct = async (data) => {
  const payload = JSON.stringify(data);
  return fetch(
    "https://7675-78-208-29-219.ngrok-free.app/api-php-stripe/api/product",
    {
      method: "POST",
      body: payload,
    }
  ).then((response) => response.json());
};
