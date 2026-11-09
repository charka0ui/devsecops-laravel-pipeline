// Configuration front-end de TechShop
// VULN-05 : secrets exposés côté client.
// Tout ce fichier est téléchargé par le navigateur : n'importe qui peut le lire
// dans l'onglet "Sources" / "Réseau" des outils de développement.
// (Même problème que celui trouvé lors de mon pentest chez OCP avec un bundle React.)
window.APP_CONFIG = {
  apiBaseUrl: "/api",
  storageBucket: "techshop-private-invoices",
  storage_api_key: "13ld90oBGYqhLltsLC7Iv7iK2nkNMCU7vH7rK1cL",
  maps_api_key: "nORpwVDu8lXxxg5GNSfHzbqpOHJhWBN72ajBfKy",
  admin_password: "zc7EERPXJ7ZX1H"
};
