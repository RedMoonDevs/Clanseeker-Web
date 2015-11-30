<?php

class ClanSeekerAPI
{
    const API_URL = "http://62.4.23.229:8338/api/";

    /**
     * Different commands
     */
    const PLAYER_SEARCH = "player_village";
    const CLAN_DETAILS = "clan_details";
    const CLAN_SEARCH = "clan_search";
    const STATUS = "status";

    /**
     * Looks for a Player using its playerId
     * @param $player_id
     * @return the json
     */
    public function searchPlayer($player_id)
    {
        return $this->apiRequest(self::PLAYER_SEARCH, array($player_id, "b64"));
    }

    /**
     * Get the clan details
     * @param $clan_id
     * @return the json
     */
    public function clanDetails($clan_id)
    {
        return $this->apiRequest(self::CLAN_DETAILS, array($clan_id));
    }

    /**
     * Looks for a clan
     * @param $clan_name
     * @return the json
     */
    public function searchClan($clan_name)
    {
        return $this->apiRequest(self::CLAN_SEARCH, array($clan_name));
    }

    /**
     * Request a special command
     * @param $api_name
     * @param $arguments
     * @return the json returned
     */
    public function apiRequest($api_name, $arguments)
    {
        foreach ($arguments as &$arg) {
            $arg = urlencode ($arg);
        }

        $final_url = self::API_URL . $api_name . "/" . join("/", $arguments);
        return json_decode(file_get_contents($final_url));
    }
}

?>