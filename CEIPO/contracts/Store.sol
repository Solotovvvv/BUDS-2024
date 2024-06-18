// SPDX-License-Identifier: MIT
pragma solidity >=0.4.25 <0.9.0;

contract Store {
    struct Data {
        string id; // ID assigned by admin
        string businessName;
        string businessBranch;
        string ownerName;
        string req; // Single field for required data
        uint256 timestamp;
    }

    mapping(address => Data) private userToData;

    // Function to store data
    function storeData(
        string memory _id,
        string memory _businessName,
        string memory _businessBranch,
        string memory _ownerName,
        string memory _req
    ) public {
        Data memory newData = Data({
            id: _id,
            businessName: _businessName,
            businessBranch: _businessBranch,
            ownerName: _ownerName,
            req: _req,
            timestamp: block.timestamp
        });

        userToData[msg.sender] = newData;
    }

    // Function to retrieve data
    function getData(address user) external view returns (
        string memory,
        string memory,
        string memory,
        string memory,
        string memory,
        uint256
    ) {
        Data storage userData = userToData[user];

        return (
            userData.id,
            userData.businessName,
            userData.businessBranch,
            userData.ownerName,
            userData.req,
            userData.timestamp
        );
    }
}