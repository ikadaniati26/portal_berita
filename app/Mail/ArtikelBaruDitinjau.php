<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArtikelBaruDitinjau extends Mailable
{
    use Queueable, SerializesModels;

    public $penulis;
    public $judul;

    public function __construct($penulis, $judul)
    {
        $this->penulis = $penulis;
        $this->judul = $judul;
    }

   public function build(){
       return $this->view('emails.artikelBaru')
                   ->subject('artikel baru untuk ditinjau')
                   ->with([
                       'penulis' => $this->penulis,
                       'judul'   => $this->judul,
                   ]);
   }
   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Artikel Baru Ditinjau',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
