const delay = (ms) => new Promise((resolve) => setTimeout(resolve, ms));

export default async function Home() {
  await delay(3500);
  return (
    <div className="container">
      <h1>Unlock your business potential with Facebook & Instagram advertising</h1>
      <p>Facebook Premier level partner agency</p>
      <button className="button">Work with us</button>
    </div>
  );
}
