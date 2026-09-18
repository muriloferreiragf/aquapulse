<?php
// O PHP e a Sessão DEVEM ser iniciados na primeira linha do arquivo
session_start();

if (!isset($_SESSION['estoque'])) {
    $_SESSION['estoque'] = 20; // Inicializando o estoque
}

// Quando o formulário for enviado (POST), o estoque diminui no servidor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comprar']) && $_SESSION['estoque'] > 0) {
        $_SESSION['estoque']--;
    }
}

$estoque = $_SESSION['estoque'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Boné Exclusivo Código Fonte</title>
  <style>
    :root { --bg: rgb(23, 23, 28); --accent: #8b5cf6; --text: #ffffff; --muted: #cccccc; }
    * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; font-family: "Segoe UI", sans-serif; }
    body { background: var(--bg); color: var(--text); line-height: 1.5; }
    a { color: inherit; text-decoration: none; }
    header { position: fixed; top: 0; left: 0; right: 0; background: rgba(23, 23, 28, 0.9); backdrop-filter: blur(6px); z-index: 1000; border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
    nav { max-width: 1200px; margin: auto; display: flex; justify-content: space-between; align-items: center; padding: 1rem; }
    nav .logo { font-weight: 700; font-size: 1.2rem; }
    nav ul { display: flex; gap: 1.5rem; }
    nav ul li { list-style: none; }
    nav ul a:hover { color: var(--accent); }
    section { padding: 5rem 1.5rem; max-width: 1200px; margin: auto; }
    .hero { display: grid; gap: 2rem; align-items: center; }
    .hero img { width: 100%; border-radius: 1rem; box-shadow: 0 0 20px rgba(0, 0, 0, 0.6); }
    .hero h1 { font-size: 2.5rem; margin-bottom: 1rem; }
    .hero p { color: var(--muted); margin-bottom: 1.5rem; }
    .btn { background: var(--accent); color: #fff; padding: 0.9rem 2rem; border: none; border-radius: 2rem; font-weight: 600; cursor: pointer; transition: 0.3s; }
    .btn:hover { background: #a78bfa; }
    .detalhes { display: grid; gap: 2rem; }
    .detalhes h2 { margin-bottom: 1rem; font-size: 2rem; }
    .carrossel { position: relative; overflow: hidden; }
    .carrossel img { width: 100%; border-radius: 1rem; }
    .carrossel button { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(0, 0, 0, 0.6); border: none; color: white; font-size: 1.5rem; cursor: pointer; padding: 0.5rem; border-radius: 50%; }
    .carrossel button:hover { background: rgba(0, 0, 0, 0.8); }
    .carrossel .prev { left: 1rem; }
    .carrossel .next { right: 1rem; }
    .exclusivo { text-align: center; }
    .exclusivo h2 { font-size: 2rem; margin-bottom: 1rem; }
    .faq h2 { font-size: 2rem; margin-bottom: 1rem; }
    .faq details { margin-bottom: 0.8rem; background: rgba(255, 255, 255, 0.05); padding: 0.8rem 1rem; border-radius: 0.5rem; }
    .comprar { text-align: center; }
    .comprar h2 { font-size: 2rem; margin-bottom: 1rem; }
    footer { background: rgba(255, 255, 255, 0.05); padding: 1rem; text-align: center; font-size: 0.9rem; }
    footer a { margin: 0 0.5rem; color: var(--accent); }
    
    /* Um pequeno ajuste no form para manter o botão centralizado caso necessário */
    .comprar form { display: inline-block; margin-top: 1rem; }
  </style>
</head>

<body>
  <header>
    <nav>
      <div class="logo">Código <span style="color:var(--accent)">Fonte</span></div>
      <ul>
        <li><a href="#sobre">Sobre o Boné</a></li>
        <li><a href="#detalhes">Detalhes</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="#comprar" style="color:var(--accent); font-weight:600;">Comprar Agora</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero -->
  <section id="sobre" class="hero">
    <div>
      <h1>Boné Exclusivo do Código Fonte</h1>
      <p>Edição limitada com apenas 20 unidades. Um item de colecionador para desenvolvedores e fãs da cultura dev.</p>
      <button class="btn" onclick="document.getElementById('comprar').scrollIntoView({behavior:'smooth'})">Garanta o Seu Agora</button>
    </div>
    <div>
      <img src="https://images.unsplash.com/photo-1516826957135-700dedea698c?q=80&w=1200" alt="Gabriel e Vanessa usando o boné">
    </div>
  </section>

  <!-- Detalhes -->
  <section id="detalhes" class="detalhes">
    <h2>Detalhes do Produto</h2>
    <p>Boné de alta qualidade, design moderno e confortável. Produzido com materiais premium.</p>
    <div class="carrossel">
      <button class="prev" onclick="prevSlide()">&#10094;</button>
      <img id="carrossel-img" src="https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=1200" alt="Imagem do boné">
      <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
  </section>

  <!-- Exclusividade -->
  <section class="exclusivo">
    <h2>Exclusividade Garantida</h2>
    <p>Apenas <strong><?php echo $estoque; ?> unidades</strong> disponíveis. Não perca a chance de ter o seu!</p>
    <button class="btn" onclick="document.getElementById('comprar').scrollIntoView({behavior:'smooth'})">Comprar Agora</button>
  </section>

  <!-- FAQ -->
  <section id="faq" class="faq">
    <h2>Perguntas Frequentes</h2>
    <details>
      <summary>Qual o material do boné?</summary>
      <p>Produzido com tecido premium de alta durabilidade.</p>
    </details>
  </section>

  <!-- Comprar -->
  <section id="comprar" class="comprar">
    <h2>Garanta o Seu Agora</h2>
    <p><strong>R$ 99,00</strong> — em até 2x sem juros. Frete grátis para todo Brasil.</p>
    
    <p>Estoque atual: <?php echo $estoque; ?></p>
    
    <!-- AQUI FOI ADICIONADO O FORMULÁRIO DA "image_03fae9.png" -->
    <?php if ($estoque > 0): ?>
      <form method="POST" action="">
        <input type="hidden" name="comprar" value="1">
        <button class="btn" type="submit">
          Comprar Agora
        </button>
      </form>
    <?php else: ?>
      <button class="btn" disabled style="background: #555; cursor: not-allowed;">Esgotado</button>
    <?php endif; ?>
  </section>

  <footer>
    <p>Siga o Código Fonte TV</p>
    <a href="https://youtube.com/@codigofontetv" target="_blank">YouTube</a> |
    <a href="https://instagram.com/codigofontetv" target="_blank">Instagram</a>
  </footer>

  <script>
    const imagens = [
      "https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=1200",
      "https://images.unsplash.com/photo-1516820580870-3f66c730d990?q=80&w=1200",
      "https://images.unsplash.com/photo-1507838153414-b4b713384a76?q=80&w=1200"
    ];
    let indice = 0;
    function nextSlide() {
      indice = (indice + 1) % imagens.length;
      document.getElementById('carrossel-img').src = imagens[indice];
    }
    function prevSlide() {
      indice = (indice - 1 + imagens.length) % imagens.length;
      document.getElementById('carrossel-img').src = imagens[indice];
    }

    // Removi a função comprar() do JavaScript pois agora o PHP faz isso através do submit do form!
  </script>
</body>
</html>