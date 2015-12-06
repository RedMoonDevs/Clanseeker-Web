<?php

class ClanSeekerAPI
{
	// This API_URL is temporary.
    const API_URL = "http://api.senshiro.co:8338/";

    /**
     * Different commands
     */
    const PLAYER_SEARCH = "player_village";
    const CLAN_DETAILS = "clan_details";
    const CLAN_SEARCH = "clan_search";
    const STATUS = "status";

    /**
     * Looks for a Player using its playerId.
	 * It also gives the image.
     * @param $player_id
     * @return the json
     */
    public function searchPlayer($player_id)
    {
        return $this->apiRequest(self::PLAYER_SEARCH . "?id=" . $player_id . "&image=true");
    }

    /**
     * Get the clan details
     * @param $clan_id
     * @return the json
     */
    public function clanDetails($clan_id)
    {
        return $this->apiRequest(self::CLAN_DETAILS . "?id=" . $clan_id);
    }

    /**
     * Looks for a clan
     * @param $clan_name
     * @return the json
     */
    public function searchClan($clan_name)
    {
        return $this->apiRequest(self::CLAN_SEARCH . "?name=" . urlencode($clan_name));
    }

    /**
     * Request a special command
     * @param $full_command
     * @param $arguments
     * @return the json returned
     */
    public function apiRequest($full_command)
    {

        $final_url = self::API_URL . $full_command;
        return json_decode(file_get_contents($final_url));
    }
}

?>
