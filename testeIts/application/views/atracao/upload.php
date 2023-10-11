<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Diretório de destino para as imagens
    $uploadDirectory = "uploads/";

    // Obtém o nome do arquivo enviado
    $filename = $_FILES["flyer"]["name"];

    // Caminho completo do arquivo no servidor
    $filePath = $uploadDirectory . $filename;

    // Verifica se o arquivo é uma imagem
    $imageFileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
  
    if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
        // Tamanho desejado para a imagem (480x580 pixels)
        $desiredWidth = 580;
        $desiredHeight = 480;

        // Move o arquivo enviado para o diretório de destino
        move_uploaded_file($_FILES["flyer"]["tmp_name"], $filePath);

        // O arquivo foi movido com sucesso
        echo "Imagem enviada e movida com sucesso.";
    } else {
        echo "Apenas arquivos JPG, JPEG, PNG ou GIF são permitidos.";
    }
}
?>
