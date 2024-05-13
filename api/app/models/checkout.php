<?php
require_once __DIR__ . "/../core/model.php";

class ModelsCheckout extends Model
{

 private function getLastId()
 {
  $sql = "SELECT MAX(id) as max_id FROM checkouts";
  $response = $this->db->query($sql);

  if (!$response) {
   die("Invalid query " . $this->db->error);
  }

  $result = $response->fetch_assoc();
  $last_id = $result['max_id'];
  return (int)$last_id;
 }

 public function createCheckout($payload)
 {
  $max_id = $this->getLastId() + 1;
  $query = $this->db->prepare("INSERT INTO checkouts (id, name, email, phone, payment_status, payment_intent, amount_total, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

  $query->bind_param('isssssis', $max_id, $payload["name"], $payload['email'], $payload['phone'], $payload['payment_status'], $payload['payment_intent'], $payload['amount_total'], $payload['date']);

  if (!$query->execute()) {
   die("Invalid query " . $this->db->error);
  }
  $query->close();
  return true;
 }

 public function getAllCheckouts()
 {
  $query = "SELECT * FROM checkouts";

  $response = $this->db->query($query);
  if (!$response) {
   die("Invalid query " . $this->db->error);
  }
  $result = $response->fetch_all(MYSQLI_ASSOC);
  $this->db->close();
  return $result;
 }
}
