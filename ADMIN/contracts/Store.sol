// SPDX-License-Identifier: MIT
pragma solidity >=0.4.25 <0.9.0;

contract Store {
    struct Data {
        string id; // ID assigned by admin
        string businessName;
        string businessBranch;
        string ownerName;
        string cedula;
        string businessPermit;
        string brgyClearance;
        string sanitaryPermit;
        string mayorsPermit;
        uint256 timestamp;
    }

    mapping(address => Data) private userToData;

    // Function to store data
    function storeData(
        string memory _id,
        string memory _businessName,
        string memory _businessBranch,
        string memory _ownerName,
        string memory _cedula,
        string memory _businessPermit,
        string memory _brgyClearance,
        string memory _sanitaryPermit,
        string memory _mayorsPermit
    ) public {
        Data memory newData = Data({
            id: _id,
            businessName: _businessName,
            businessBranch: _businessBranch,
            ownerName: _ownerName,
            cedula: _cedula,
            businessPermit: _businessPermit,
            brgyClearance: _brgyClearance,
            sanitaryPermit: _sanitaryPermit,
            mayorsPermit: _mayorsPermit,
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
            userData.cedula,
            userData.businessPermit,
            userData.brgyClearance,
            userData.sanitaryPermit,
            userData.mayorsPermit,
            userData.timestamp
        );
    }
}
