const Store = artifacts.require("Store");

module.exports = function (deployer) {
  const deployerAccount = "0xA80576Ee78690452B0578a4017B1dF3191FEB2Ca"; // Replace with your account
  deployer.deploy(Store, { from: deployerAccount });
};
