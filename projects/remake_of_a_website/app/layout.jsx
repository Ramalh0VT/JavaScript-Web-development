import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";

const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export const metadata = {
  title: "Cool app",
  description: "idk",
};

export default function RootLayout({ children }) {
  return (
    <html lang="pt-br" className={`${geistSans.variable} ${geistMono.variable}`}>
      <body>{children}</body>
	<ul>
	  	<li>Ayuda</li>
	  	<li>Companhia</li>
	  	<li>Sobre</li>
	  	<li>Quien somos?</li>
	  </ul>
	

	  <footer>
	  	<ul>
	  		<li>X / twitter</li>
	  		<li>Facebook</li>
	  		<li>Linkedin</li>
	  	</ul>
	  </footer>
    </html>
  );
}
