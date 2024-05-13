const checkoutProduct = async (data) => {
  const payload = JSON.stringify(data);
  return fetch(
    "https://7675-78-208-29-219.ngrok-free.app/api-php-stripe/api/checkout",
    {
      method: "POST",
      body: payload,
    }
  )
    .then((response) => response.json())
    .then((res) => window.location.replace(res.url));
};
