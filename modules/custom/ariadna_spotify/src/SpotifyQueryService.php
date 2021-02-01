<?php

namespace Drupal\ariadna_spotify;

use Drupal\ariadna_spotify\SpotifyQueryServiceInterface;

/**
 * Class SpotifyQueryService.
 */
class SpotifyQueryService implements SpotifyQueryServiceInterface {
  
  private $token = '';

  /**
   * Constructs a new SpotifyQueryService object.
   */
  public function __construct() {

  }

  /**
   * Query release from spotify.
   */
  public function queryRelease() { 
    $resp = \Drupal::httpClient()
      ->get('https://api.spotify.com/v1/browse/new-releases', [
        'headers' => [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Authorization' => 'Bearer ' . $this->token,//Basic ' . base64_encode('c38154671d534917a6f8015a2c4522ba' . ':' . '72832546dcb64cd687c9bea91f279662'),
        ],
      ]);

    return json_decode($resp->getBody(), true);
  }

  /**
   * Query release from spotify.
   */
  public function artist($id) { 
    $resp = \Drupal::httpClient()
      ->get("https://api.spotify.com/v1/artists/${id}", [
        'headers' => [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Authorization' => 'Bearer ' . $this->token,//Basic ' . base64_encode('c38154671d534917a6f8015a2c4522ba' . ':' . '72832546dcb64cd687c9bea91f279662'),
        ],
      ]);

    return json_decode($resp->getBody(), true);
  }

  /**
   * Query release from spotify.
   */
  public function artistAlbums($id) { 
    $resp = \Drupal::httpClient()
      ->get("https://api.spotify.com/v1/artists/${id}/albums", [
        'headers' => [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Authorization' => 'Bearer ' . $this->token,//Basic ' . base64_encode('c38154671d534917a6f8015a2c4522ba' . ':' . '72832546dcb64cd687c9bea91f279662'),
        ],
      ]);

    return json_decode($resp->getBody(), true)['items'];
  }

  /**
   * Query release from spotify.
   */
  public function albumsTracks($id) { 
    $resp = \Drupal::httpClient()
      ->get("https://api.spotify.com/v1/albums/${id}/tracks", [
        'headers' => [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Authorization' => 'Bearer ' . $this->token,//Basic ' . base64_encode('c38154671d534917a6f8015a2c4522ba' . ':' . '72832546dcb64cd687c9bea91f279662'),
        ],
      ]);

    return json_decode($resp->getBody(), true)['items'];
  }

}
