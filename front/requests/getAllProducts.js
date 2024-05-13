const getAllProducts = async () => {
  return fetch(
    "https://7675-78-208-29-219.ngrok-free.app/api-php-stripe/api/products",
    {
      method: "GET",
    }
  ).then((response) => response.json());
};
