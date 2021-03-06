<?php

namespace Drupal\ariadna_spotify;

use Drupal\ariadna_spotify\SpotifyQueryServiceInterface;

/**
 * Class SpotifyQueryService.
 */
class SpotifyQueryService implements SpotifyQueryServiceInterface {
  
  private $code = 'YzM4MTU0NjcxZDUzNDkxN2E2ZjgwMTVhMmM0NTIyYmE6NzI4MzI1NDZkY2I2NGNkNjg3YzliZWE5MWYyNzk2NjI=';
  private $token = '';

  /**
   * Constructs a new SpotifyQueryService object.
   */
  public function __construct() {
    $confSpotify = \Drupal::config('ariadna_spotify.spotify');
    $this->code = base64_encode($confSpotify->get('client_id') . ':' . $confSpotify->get('client_secret'));
  }

  /**
   * Query release from spotify.
   */
  public function getToken() { 
    $resp = \Drupal::httpClient()
      ->post('https://accounts.spotify.com/api/token', [
        'headers' => [
          'Content-Type' => 'application/x-www-form-urlencoded',
          'Authorization' => 'Basic ' . $this->code,
        ],
        'form_params' => [
          'grant_type' => 'client_credentials',
        ]
      ]);

    $this->token = json_decode($resp->getBody(), true)['access_token'];
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
          'Authorization' => 'Bearer ' . $this->token,
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
          'Authorization' => 'Bearer ' . $this->token,
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
          'Authorization' => 'Bearer ' . $this->token,
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
          'Authorization' => 'Bearer ' . $this->token,
        ],
      ]);

    return json_decode($resp->getBody(), true)['items'];
  }

}
