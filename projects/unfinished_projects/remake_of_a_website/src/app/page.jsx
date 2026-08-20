const delay = (ms) => new Promise((resolve) => setTimeout(resolve, ms));

export default async function Home() {
  await delay(3500);
  return (
    <>
      <header className="header">
        <img src="/images/tier.jpeg" width="100" alt="Logo" />
        <a href="#">What we do</a>
        <a href="#">Blog</a>
        <a href="#">Podcast</a>
        <a href="#">Careers</a>
        <div className="button_cont">
          <button className="button">Work with us</button>
        </div>
      </header>

      <div className="container">
        <h1>Unlock your business potential with Facebook & Instagram advertising</h1>
        <p>Facebook Premier level partner agency</p>
        <button>Work with us</button>
      </div>

      <footer>
        <div><img src="/nil" alt="imagem" /><p>Facebook premier</p><p>Level agency partner</p></div>
        <div><img src="/nil" alt="imagem" /><p></p></div>
        <div><img src="/nil" alt="imagem" /><p></p></div>
        <div><img src="/nil" alt="imagem" /><p></p></div>
        <div><img src="/nil" alt="imagem" /><p></p></div>
        <div><img src="/nil" alt="imagem" /><p></p></div>
      </footer>
    </>
  );
}
