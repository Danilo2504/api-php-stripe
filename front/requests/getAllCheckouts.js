const getAllCheckouts = async () => {
  return fetch(
    "https://7675-78-208-29-219.ngrok-free.app/api-php-stripe/api/checkouts"
  ).then((response) => response.json());
};
