import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";

import Link from "next/link";

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
	<header>
	  	<p><Link href="/sobre">Sobre</Link></p>
	  	<p><Link href="/ayuda">Ayuda</Link></p>
	  	<p><Link href="/quienessomos"> Quiénes somos</Link></p>
	 </header>
		
	  <footer>
	  	<p>Todos los derechos reservados à companhia interessante</p>
	  </footer>
    </html>
  );
}
